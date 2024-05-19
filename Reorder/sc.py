
from collections import defaultdict

def parse_defect_ids(file_path):
    """Parse defect IDs from the given file."""
    defect_ids = defaultdict(list)
    with open(file_path, 'r') as file:
        for line in file:
            parts = line.strip().split(' - ID: ')
            if len(parts) == 2:
                image_name = parts[0].split('_')[-2] + '_' + parts[0].split('_')[-1]  # Extract timestamp
                ids = list(map(int, parts[1].split(', ')))
                defect_ids[image_name].append((parts[0], ids))
    return defect_ids

def compare_defects(file1_defects, file2_defects):
    """Compare defects between two sets of images."""
    matched_images = []
    for timestamp, defects1 in file1_defects.items():
        if timestamp in file2_defects:
            defects2 = file2_defects[timestamp]
            for defect1 in defects1:
                for defect2 in defects2:
                    if sorted(defect1[1]) == sorted(defect2[1]):
                        matched_images.append((defect1, defect2))
    return matched_images

def generate_output(matched_images):
    """Generate output in the desired format."""
    output = []
    for pair in matched_images:
        new_image, old_image = pair
        output.append("{new} > " + new_image[0] + " - ID: " + ', '.join(map(str, new_image[1])) +
                      "     {old} > " + old_image[0] + " - ID: " + ', '.join(map(str, old_image[1])))
    return output

file1_path = 'new.txt'
file2_path = 'old.txt'

file1_defects = parse_defect_ids(file1_path)
file2_defects = parse_defect_ids(file2_path)

print("Defects in file 1:", file1_defects)
print("Defects in file 2:", file2_defects)




