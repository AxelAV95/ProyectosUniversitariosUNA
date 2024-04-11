class Interfaz{
	
	public:
		
		string ingresarMarca(){
			string marca;
			cout << "Ingrese la marca del auto: ";
			getline(cin,marca);
			getline(cin,marca);
			
			return marca;
		}
		
		string ingresarModelo(){
			string modelo;
			cout << "Ingrese el modelo del auto: "<< endl;
			getline(cin,modelo);
			
			
			return modelo;
		}
		
		string ingresarColor(){
			string color;
			cout << "Ingrese el color del auto: ";
			getline(cin,color);
			
			return color;
		}
};
