#!/bin/bash
optimize() {
  pngcrush *.png
  jpegoptim *.jpg --strip-all --max=95
  for i in *
  do
    if test -d $i
    then
      cd $i
      echo $i
      optimize
      cd ..
    fi
  done
  echo
}
optimize
