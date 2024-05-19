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

with open(output_json_file, 'w') as output_json:
    json.dump(data, output_json, indent=2)

print(f'JSON file "{output_json_file}" saved successfully with image order.')

with open(output_json_file, 'r') as json_file:
    data1 = json.load(json_file)

unique_locations = set(item['name'] for item in data1)

sorted_data = []
for selected_location in unique_locations:
    for item in data1:
        if item.get('name') == selected_location:
            item['defects'] = sorted(item.get('defects', []), key=lambda x: x.get("image", ""))
            sorted_data.append(item)

# Sort the final data based on the first defect's "image" field
sorted_data = sorted(sorted_data, key=lambda x: x.get('defects', [])[0].get("image", ""))

sorted_output_json_file = 'fi_sorted_defects.json'
with open(sorted_output_json_file, 'w') as sorted_output_json:
    json.dump(sorted_data, sorted_output_json, indent=2)

print(f'JSON file "{sorted_output_json_file}" saved successfully with sorted data.')
