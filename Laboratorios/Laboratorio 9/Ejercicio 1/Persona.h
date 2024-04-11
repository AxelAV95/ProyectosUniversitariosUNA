class Persona{
	private:
		string nombre;
		striing cedula;
	
	public:
		
		string getNombre(){
			return nombre;
		}
		string getCedula(){
			return cedula;
		}
		
		void setNombre(string name){
			nombre = name;
		}
		
		void setCedula(string id){
			cedula = id;
		}
};
