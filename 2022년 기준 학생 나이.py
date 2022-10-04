birth_year = int(input("당신의 태어난 년도를 입력해주세요: "))

age = 2022 - birth_year + 1 #2022년 기준

if (20 <= age) and age <= 26:
    print("대학생")
elif (17 <= age) and age < 20:
    print("고등학생")
elif (14 <= age) and age < 17:
    print("중학생")
elif (8 <= age) and age < 14:
    print("초등학생")
else:
    print("학생이 아닙니다")
