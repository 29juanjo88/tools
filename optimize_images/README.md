Optimize images Mini tool
=============

This is just a mini tool that would help you to reduce the size of the images in a folder if they are png's or jpg's
It will do it recursively and will replace the actual files.
It will preserve the quality of png's and 95% quality for jpg's 

###1. Prerequisites
You must have pngcrush & jpegoptim, check how to install them in your distribution

###2. Download
Just download the optimize_images.sh file and place it in the folder where the images are

###3. Permissions
Make sure the file has execution permissions
```bash
  chmod +x optimize_images.sh
```
###4. Usage
Go to the path where you have the images and place the sh file, then just do
```bash
  ./optimize_images.sh
```
