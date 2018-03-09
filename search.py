import sys

states = ['ALABAMA', 'ALASKA', 'ARIZONA', 'ARKANSAS', 'CALIFORNIA', 'COLORADO', 'CONNECTICUT',
			'DELAWARE', 'FLORIDA', 'GEORGIA', 'HAWAII', 'IDAHO', 'ILLINOIS', 'INDIANA', 'IOWA',
			'KANSAS', 'KENTUCKY', 'LOUISIANA', 'MAINE', 'MARYLAND', 'MASSACHUSETTS', 'MICHIGAN',
			'MINNESOTA', 'MISSISSIPPI', 'MISSOURI', 'MONTANA', 'NEBRASKA', 'NEVADA', 'NEW HAMPSHIRE',
			'NEW JERSEY', 'NEW MEXICO', 'NEW YORK', 'NORTH CAROLINA', 'NORTH DAKATO', 'OHIO', 'OKLAHOMA',
			'OREGON', 'PENNSYLVANIA', 'RHODE ISLAND', 'SOUTH CAROLINA', 'SOUTH DAKATO', 'TENNESSEE', 'TEXAS',
			'UTAH', 'VERMONT', 'VIRGINIA', 'WASHINGTON', 'WEST VIRGINIA', 'WISCONSIN', 'WYOMING'
		]
abbrev = ['AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS',
			'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 
			'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OG', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VA',
			'WA', 'WV', 'WI', 'WY']

def dictionary(search):
	search_upper = search.upper()
	if search_upper in states:
		index = states.index(search_upper)
		return abbrev[index]
	if search_upper in abbrev:
		return search_upper
	return "INVALID"

def main():
	file_name = sys.argv[1]
	search_term_orig = sys.argv[2].replace("\"", "")
	riders = 0
	rides = ""
	search_term_new = dictionary(search_term_orig)

	if search_term_new == "INVALID":
		print ('Search not valid: Check spelling or your knowledge of the states')
		return
	
	with open(file_name, "r") as file:
		for line in file:
			first_name, last_name, company, website, twitter, source = line.split(",")
			if search_term_new in source:
				riders = riders + 1
				rides += first_name + " " + last_name + "; " + company + "; " + source + "<br />"
	print('Number of trekkers leaving from {}: {}<br/>'.format(search_term_new,riders))
	print('<br/>')
	print(rides)
	return

if __name__ == "__main__":
    main()