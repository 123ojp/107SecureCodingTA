for d in ./*/ ;
do
  (cd "$d" ; docker-compose stop ; cd ..);
done
