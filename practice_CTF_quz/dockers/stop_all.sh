for d in ./*/ ;
do
  (cd "$d" ; docker-compose down ; cd ..);
done
