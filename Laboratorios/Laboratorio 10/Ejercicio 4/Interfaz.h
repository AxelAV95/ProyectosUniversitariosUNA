class Interfaz{
	
	
	public:
		
		int ingresarHoras(){
			
			int n;
			cout << "Ingrese cantidad de horas laboradas por empleado: ";
			cin >> n;
			
			return n;
		}
		
		string solicitarNombre(){
			
			string name;
			cout << "Ingrese el nombre del empleado:  ";
			getline(cin,name);
			getline(cin,name);
			
			return name;
		}
		
		string solicitarCedula(){
			
			string id;
			cout << "Ingrese la cedula del empleado: ";
			getline(cin,id);
			
			return id;
		}
		int ingresarNEmpleados(){
			int x;
			cout << "Ingrese el numero de empleados: ";
			cin >> x;
				
			return x;
		}
		void imprimir(int hour, int salarioB, int salarioN, string nombre){
		
			cout << "El empleado " << nombre << " laboro " << hour << " cantidad de horas, salario bruto " << salarioB << " , salario neto " << salarioN << endl;	
		}
};
