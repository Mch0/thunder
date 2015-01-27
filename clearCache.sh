if[ -d "./app/tmp/cache" ]; then
cd ./app/tmp/cache/models;
rm -rf *;

cd ..;
cd persistent;
rm -rf *;
fi
