line = "  DJI_RIGHT_20240228102328_0018_V.JPG - ID: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20"
filename = line.split('_', 2)[2].split(' - ')[0]

print(filename)
