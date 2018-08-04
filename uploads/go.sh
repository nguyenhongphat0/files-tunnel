c=0
while true
url=$(<url)
user=$(<user)
cmd=`printf "curl -H @header $url$user"`
do
	c=`expr $c + 1`
	echo
	echo $c
	$cmd
done
