class Animal{
	
	private:
		string clasificacion;
		string nombre;
		string edad;
		string raza;
		string domesticidad;
		
	public:
		Animal();
		Animal(string nombre, string edad){
			setNombre(nombre);
			setEdad(edad);
		}
		
		Animal(string clasificacion, string raza, string domesticidad){
			setClasificacion(clasificacion);
			setRaza(raza);
			setDomesticidad(domesticidad);
		}
		
		string getClasificacion(){
			return clasificacion;
		}
		
		void setClasificacion(string nClasificacion){
			clasificacion = nClasificacion;
		}
		
		string getNombre(){
			return nombre;
		}
		
		void setNombre(string nNombre){
			nombre = nNombre;
		}
		
		string getEdad(){
			return edad;
		}
		
		void setEdad(string nEdad){
			edad = nEdad;
		}
		
		string getRaza(){
			return raza;
		}
		
		void setRaza(string nRaza){
			raza = nRaza;
		}
		
		string getDomesticidad(){
			return domesticidad;
		}
		
		void setDomesticidad(string nDomesticidad){
			domesticidad = nDomesticidad;
		}
		
		
};
