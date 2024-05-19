import json
import os
import argparse

parser = argparse.ArgumentParser()
parser.add_argument('-f', '--input_file')
args = parser.parse_args()

if not args.input_file:
    print('Please provide the input JSON file using -f or --input_file.')
    exit()

input_json_file = args.input_file
output_json_file = 'fi_defects_with_image_names.json'

with open(input_json_file, 'r') as json_file:
    data = json.load(json_file)

for location in data:
    for defect in location.get('defects', []):
        original_path = defect.get('original', None)
        if original_path:
            image_name = os.path.basename(original_path)
            defect['image'] = image_name

# Sort defects based on the 'image' field within each location
for location in data:
    location['defects'] = sorted(location.get('defects', []), key=lambda x: x.get("image", ""))

with open(output_json_file, 'w') as output_json:
    json.dump(data, output_json, indent=2)

print(f'JSON file "{output_json_file}" saved successfully with sorted defects based on image names.')
