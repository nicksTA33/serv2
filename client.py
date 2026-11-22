import requests

HOST = 'http://localhost:8000/api/vehicles'

response = requests.get(HOST, timeout=10)
response.raise_for_status()
data = response.json()

print(f"Кількість транспортних засобів: {data['count']}")
for vehicle in data['items']:
    print(f"\nid: {vehicle['id']}")
    print(f"make: {vehicle['make']}")
    print(f"model: {vehicle['model']}")
    print(f"price: {vehicle['price']}")
    print(f"category: {vehicle['category']}")