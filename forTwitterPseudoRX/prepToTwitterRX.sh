# Thanks to: http://linuxcommando.blogspot.com/2008/03/using-sed-to-extract-lines-in-text-file.html
# FINIS. 11/05/2015 06:41:22 PM -RAH

# OPTIONAL shuffle of src file on each script run:
for i in {1..8}
do
shuf psuedoRXrotationSRC.txt > temp.txt
rm psuedoRXrotationSRC.txt
mv temp.txt psuedoRXrotationSRC.txt
# Store first line of source text in a variable; then store it in a text file (named after the value, without an extension), and also append the value to a text file of used lines:
val=`head -n 1 psuedoRXrotationSRC.txt`
dateVal=`date`
echo Selected for publication: $dateVal > $val
echo $val >> usedPseudoRX.txt
# Delete first line from source text, via in-line replace:
sed -i 1d psuedoRXrotationSRC.txt
done