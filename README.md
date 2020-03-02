# OG Image API

OG Image API is a PHP script for creating OG images.

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

## License
[MIT](https://choosealicense.com/licenses/mit/)