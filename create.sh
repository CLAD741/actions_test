set -e

echo "Creacion de la imagen Joomla plantilla yard con alpine"
#rm joomla.tar | true
#mv joomla/images joomla/_images | true

cd joomla/ && tar -cvf ../joomla.tar . && cd ..

chmod 777 -R joomla.tar

##Cambiar aqui la version de la imagen a compilar

#docker build . -t sitiosweb/sw-jl-plantilla-facultades-alpine:1.0.0
