# FINIS. 11/06/2015 09:25:33 PM -RAH
	# Thanks to: http://linuxcommando.blogspot.com/2008/03/using-sed-to-extract-lines-in-text-file.html

# TO DO
# Remove texteffect.sh dependency--what I am doing is too simple to need that.

for i in {1..20}
do
# GET QUASINAYME FROM SOURCE FILE AND LOG USE.
	# OPTIONAL shuffle of src file on each script run:
	shuf QuasiNaymesRotationSRC.txt > temp.txt
	rm QuasiNaymesRotationSRC.txt
	mv temp.txt QuasiNaymesRotationSRC.txt
# Store first line of source text in a variable; then store it in a text file (named after the value, without an extension), and also append the value to a text file of used lines:
val=`head -n 1 QuasiNaymesRotationSRC.txt`
echo $val >> usedPsuedoNaymes.txt
# Delete first line from source text, via in-line replace:
sed -i 1d QuasiNaymesRotationSRC.txt

# CREATE APPROPRIATELY NAMED IMAGE FROM FETCHED FETCHIN' NAME.
	# Re: http://www.fmwconcepts.com/imagemagick/texteffect/index.php
	# ALSO see: http://stackoverflow.com/a/31854648
./texteffect.sh -t "Share a Sugar Dope with\n." -f LOKICOLA.TTF -p 72 -c red -b white A.png
./texteffect.sh -t "$val" -f BernsYouHybrid436wt.ttf -p 135 -c red -b white B.png
convert A.png B.png -gravity South -append shareAsugarDopeWith_$val.png
rm A.png B.png
done