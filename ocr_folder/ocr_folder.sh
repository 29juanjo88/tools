ocr_folder() {
 for f in *.jpg; 
 do 
  echo "scanning [ $f ]"; 
  tesseract $f $f -l spa  > /dev/null
  echo "...OK scanned $f";
done

for i in *
do
  if test -d $i
    then
    cd $i
    echo "|"
    echo " -----Scanning folder $i ";
    echo " "
    echo $i
    ocr_folder
    cd ..
  fi
done
echo
}
ocr_folder
