class VideoStudio{
	
	public:
		string nombre;
		string cedula_juridica;
		string ubicacion;
		
	
	public:
		/*Mètodos get*/
		
		string getNombre(){
			return nombre;
		}
		string getCedJurid(){
			return cedula_juridica;
		}
		string getUbicacion(){
			return ubicacion;
		}
		
		/*Mètodos set*/
		void setNombre(string name){
			nombre = name;
		}
		
		void setCedJurid(string ced){
			cedula_juridica = ced;			
		}
		
		void setUbicacion(string ubi){
			ubicacion = ubi;
		}
		
		/*MÉTODO QUE ELIMINA UN ELEMENTO DEL VECTOR
		@param vector<T> &arreglo: recibe un vector con objetos	
		@param T &dato: recibe un objeto de la clase
		Funcion: Al recibir el vector y el objeto, recorre el vector y verifica que si el objeto pasado
		por referencia es igual al del arreglo, se proceda a eliminar.
		*/
		template <class T>
		void vector_quitar (vector<T> &arreglo, T &dato){
		    int i, n=arreglo.size();
		    for (i=0; i<n; i++)
		        if (dato==arreglo[i])        {
		            arreglo.erase (arreglo.begin()+i);
		            return;
		            }
		}
		
		

};
