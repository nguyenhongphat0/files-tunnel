c=0
while true
url=$(<url)
user=$(<user)
cmd=`printf "curl --output log -H @header $url$user"`
do
	c=`expr $c + 1`
	echo $c
	echo $cmd
	$cmd &
done
