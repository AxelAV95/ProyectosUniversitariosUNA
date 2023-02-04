class Complejo: public ObraGris{
	
	private:
		string nombre;
		string ubicacion;
		string cedulaJuridica;
		string responsableLegal;
		
	public:
		
		Complejo(){
		}
		///Metodos get
		string getNombre(){
			return nombre;
		}
		string getUbicacion(){
			return ubicacion;
		}
		
		string getCedulaJuridica(){
			return cedulaJuridica;
		}
		string getResponsableLegal(){
			return responsableLegal;
		}
		//Metodos set
		void setNombre(string name){
			nombre = name;
		}
		void setUbicacion(string location){
			ubicacion = location;
		}
		void setCedulaJuridica(string id){
			cedulaJuridica = id;
		}
		void setResponsableLegal(string resp){
			responsableLegal = resp;
		}
	
};
