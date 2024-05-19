import json
import argparse

def generate_unique_locations_text_file(input_json_file, output_text_file):
    with open(input_json_file, 'r') as json_file:
        data = json.load(json_file)

    unique_locations_dict = {}
    for location in data:
        location_name = location['name']
        unique_locations_dict[location_name] = {}

        for defect in location['defects']:
            image_name = defect.get('original', None)
            elevation_id = defect['defect_id_elevation']

            if image_name:
                image_name = image_name.split('/')[-1]

                if image_name not in unique_locations_dict[location_name]:
                    unique_locations_dict[location_name][image_name] = []

                unique_locations_dict[location_name][image_name].append(elevation_id)

    with open(output_text_file, 'w') as text_file:
        for location, image_info_dict in unique_locations_dict.items():
            text_file.write(f"{location}:\n")
            for image_name, elevation_ids in image_info_dict.items():
                text_file.write(f"  {image_name} - ID: {', '.join(str(id) for id in elevation_ids)}\n")

    print(f'Text file "{output_text_file}" saved successfully with unique location information.')

if __name__ == "__main__":
    parser = argparse.ArgumentParser(description='Generate text file with unique location information.')

    parser.add_argument('-f', '--input_file', type=str, help='Input JSON file with defects', required=True)
    parser.add_argument('-o', '--output_text_file', type=str, help='Output text file', required=True)

    args = parser.parse_args()
    generate_unique_locations_text_file(args.input_file, args.output_text_file)
