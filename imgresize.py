import os
import sys
from PIL import Image

def reduce_image_size(input_folder, output_folder, target_size_kb):
    os.makedirs(output_folder, exist_ok=True)

    jpg_files = [file for file in os.listdir(input_folder) if file.lower().endswith(".jpg")]

    for jpg_file in jpg_files:
        jpg_file_path = os.path.join(input_folder, jpg_file)

        image = Image.open(jpg_file_path)

        current_size_kb = os.path.getsize(jpg_file_path) / 1024 

        quality = int((target_size_kb / current_size_kb) * 100)

        resized_output_path = os.path.join(output_folder, jpg_file)
        image.save(resized_output_path, optimize=True, quality=quality)

if __name__ == "__main__":
    input_folder = sys.argv[1]
    output_folder = "output_images"
    target_size_kb = 12000

    reduce_image_size(input_folder, output_folder, target_size_kb)
    print(f"Resized and saved.")
