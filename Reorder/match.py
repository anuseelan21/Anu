import json

my_list = []
my_list2 = []
matching_lines = []

with open('new.txt', 'r') as file:
    for line in file:
        my_list.append(line)

with open('old.txt', 'r') as file2:
    for line2 in file2:
        my_list2.append(line2)

for x in range(len(my_list)):
    for y in range(len(my_list2)):
        m1_parts = my_list[x].split('_', 2)
        m2_parts = my_list2[y].split('_', 2)
        if len(m1_parts) > 2 and len(m2_parts) > 2:
            match = m1_parts[2].split(' - ')[0]
            match2 = m2_parts[2].split(' - ')[0]
            if match == match2:
                matching_lines.append({"new": my_list[x].strip(), "old": my_list2[y].strip()})
                break

with open('matched_images.json', 'w') as outfile:
    json.dump(matching_lines, outfile, indent=4)
