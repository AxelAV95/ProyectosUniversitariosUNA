

class Perro{

	private:
		string name;
		string raza;
		int anio;
		string color;
	
	public:
		Perro();
		void ladrar();
		void correr();
		
		//Constructores
		Perro(string name, string type, int age, string color ){
			setNombre(name);
			setRaza(type);
			setAnio(age);
			setColor(color);
			
		}
		
		//Set y get
		string getNombre(){
			return name;
		}
		
		void setNombre(string name){
			name = name;
		}
		
		string getRaza(){
			return raza;
		}
		
		void setRaza(string type){
			raza = type;
		}
		
		int getAnio(){
			return anio;
		}
		
		void setAnio(int age){
			anio = age;
		}
		
		string getColor(){
			return color;
		}
		
		void setColor(string Ncolor){
			color = Ncolor;
		}
		
		void ImprimirDetalles(){
			
		}

};
