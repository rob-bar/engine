#!/bin/bash

now=`date`
unixtime=`date -j -f "%a %b %d %T %Z %Y" "$now" "+%s"`
dir=$HOME/Desktop/$unixtime

cp -r . $dir
cd $dir

find . -name .git | xargs rm -rf $
find . -name .gitmodules | xargs rm -rf $

rm export.sh
rm README.md
rm build.xml
