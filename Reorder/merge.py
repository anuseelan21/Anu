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
output_json_file = 'fi_defects.json'

with open(input_json_file, 'r') as json_file:
    data = json.load(json_file)

for location in data:
    for defect in location.get('defects', []):
        original_path = defect.get('original', None)
        if original_path:
            image_name = os.path.basename(original_path)
            defect['image'] = image_name
    location_url = location.get('url', '')
    if location_url:
        building_name = location_url.split('/')[3]

with open(output_json_file, 'w') as output_json:
    json.dump(data, output_json, indent=2)

print(f'JSON file "{output_json_file}" saved successfully with image order.')

with open(output_json_file, 'r') as json_file:
    data = json.load(json_file)

for location in data:
    location['defects'] = sorted(location.get('defects', []), key=lambda x: x.get('image', ''))

for location in data:
    for index, defect in enumerate(location.get('defects', []), start=1):
        defect['defect_id_elevation'] = index

with open(output_json_file, 'w') as output_json:
    json.dump(data, output_json, indent=2)

print(f'JSON file "{output_json_file}" saved successfully with defects sorted by timestamp and updated defect_id_elevation.')


def generate_unique_locations_text_file(output_json_file, output_text_file):
    with open(output_json_file, 'r') as json_file:
        data = json.load(json_file)

   
    unique_locations_dict = {}
    for location in data:
        location_name = location['name']
        unique_locations_dict[location_name] = {}

        for defect in location['defects']:
            image_name = defect['image']
            elevation_id = defect['defect_id_elevation']

            if image_name not in unique_locations_dict[location_name]:
                unique_locations_dict[location_name][image_name] = []

            unique_locations_dict[location_name][image_name].append(elevation_id)

    # Write the information to a text file
    with open(output_text_file, 'w') as text_file:
        for location, image_info_dict in unique_locations_dict.items():
            text_file.write(f"**************************************************************\n")
            text_file.write(f"{location}:\n")
            text_file.write(f"**************************************************************\n")
            for image_name, elevation_ids in image_info_dict.items():
                elevation_ids_str = ', '.join(map(str, elevation_ids))
                text_file.write(f"  {image_name}: {elevation_ids_str}\n")

    print(f'Text file "{output_text_file}" saved successfully with unique location information.')


output_text_file = f'{building_name}.txt'
generate_unique_locations_text_file(output_json_file, output_text_file)