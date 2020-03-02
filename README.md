# OG Image API

OG Image API is a PHP script for creating OG images. This is a basic implementation with potential.

## Requirements

In order to create OG images, you will need wkhtmltopdf and wkhtmltoimage installed in the server.

## Installation

Installing wkhtmltopdf and wkhtmltoimage in Ubuntu

```bash
wget https://github.com/wkhtmltopdf/wkhtmltopdf/releases/download/0.12.4/wkhtmltox-0.12.4_linux-generic-amd64.tar.xz
tar -xvf wkhtmltox-0.12.3_linux-generic-amd64.tar.xz
cd wkhtmltox/bin/
sudo mv wkhtmltopdf  /usr/bin/wkhtmltopdf
sudo mv wkhtmltoimage  /usr/bin/wkhtmltoimage
```
## Usage

```ruby
response = HTTParty.get("[HOST]/create.php?url=[URL]&image_name=[IMAGE_NAME]") # Access the API through httparty and pass the url of the page and the name
if response.parsed_response['statusCode'] == 200 # If the image was processed grab the link of the image
	image_url = response.parsed_response['statusMessage']
end
HTTParty.get("[HOST]/delete.php") # Remove the images created
```

## License
[MIT](https://choosealicense.com/licenses/mit/)