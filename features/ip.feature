Feature: IP Lookup
	As an anonymous user
	I need to be able to get my details

	Rules:
	- My IP is 222.222.222.222

	Scenario:
		When I send a GET request to "/"
		Then the response code should be 200
		And the response should a "message" containing my IP address