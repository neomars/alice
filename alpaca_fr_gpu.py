import argparse
import torch
from transformers import AutoTokenizer, AutoModelForCausalLM, BitsAndBytesConfig, GenerationConfig, TextStreamer

#config load model in 4bit precision
bnb_config = BitsAndBytesConfig(
    load_in_4bit=True,
    bnb_4bit_use_double_quant=True,
    bnb_4bit_quant_type="nf4",
    bnb_4bit_compute_dtype=torch.bfloat16
)




parser = argparse.ArgumentParser(description="Résume un texte en 5 lignes")
parser.add_argument("-c", "--content", type=str, required=True, help="Contenu à résumer")
args = parser.parse_args()

model_id = "jpacifico/French-Alpaca-7B-Instruct-beta"
model = AutoModelForCausalLM.from_pretrained(model_id, quantization_config=bnb_config, device_map={"":0})
tokenizer = AutoTokenizer.from_pretrained(model_id, add_eos_token=True, padding_side='left')
streamer = TextStreamer(tokenizer, timeout=10.0, skip_prompt=True, skip_special_tokens=True)

#parameters
temperature: float = 0.7
top_p: float = 1.0
top_k: float = 0
repetition_penalty: float = 1.1
max_new_tokens: int = 1024



def chat_with_frenchalpaca(query: str):
    input_ids = tokenizer.apply_chat_template([{"role": "user", "content": query}], return_tensors="pt").to(model.device)
    input_length = input_ids.shape[1]

    generated_outputs = model.generate(
        input_ids=input_ids,
        generation_config=GenerationConfig(
            temperature=temperature,
            do_sample=temperature > 0.0,
            top_p=top_p,
            top_k=top_k,
            repetition_penalty=repetition_penalty,
            max_new_tokens=max_new_tokens,
            pad_token_id=tokenizer.eos_token_id
        ),
        streamer=streamer,
        return_dict_in_generate=True,
    )
    generated_tokens = generated_outputs.sequences[0, input_length:]
    generated_text = tokenizer.decode(generated_tokens, skip_special_tokens=True)

    return generated_text

prompt = args
result = chat_with_frenchalpaca(str(prompt))

print(result)

