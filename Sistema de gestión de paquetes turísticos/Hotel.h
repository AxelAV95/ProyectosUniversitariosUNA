
class Hotel : public Complejo{
	
	private:
		string habitacion;
		string alimentacion;
		string precio; /// este lo ingresará el administrador
		string infoPrecios;
		double precio2; ///este lo ingresara el turista
		
	
	public:
		//Constructor
		Hotel(){}
		
		//Métodos get
		
		double getPrecio2(){
			return precio2;
		}
		string getInfoPrecios(){
			return infoPrecios;
		}
		
		int realizarReserva(int precio){ //recibira el precio establecido por el hotel
		
		
			
			bool verificar = false;
			int opcion;
			int aux = 0;
			int total = 0;
			cout << "Ingrese opcion: ";
			cin >> opcion;//1 si // 2no // 3 realizaralgo
			if(opcion == 1){
				verificar = true;
				if(verificar == true){
				
				total = (precio * 0.3)+ precio;
				cout << total;
				}
			}else if(opcion == 2){
				verificar = false;
			}else if(opcion == 3){
				cout << "salir";
			}
			
			
			
			return total;
			
		}
		
		string getHabitacion(){
			return habitacion;
		}
		
		string getAlimentacion(){
			return alimentacion;
		}
		
		string getPrecio(){
			return precio;
		}
		
		
		//Métodos set
		
		void setPrecio2(double p){
			precio2 = p;
		}
		void setHabitacion(string room){
			habitacion = room;
		}
		void  setAlimentacion(string food){
			alimentacion = food;
		}
		void setPrecio(string price){
			precio = price;
		}
		void setInfoPrecios(string info){
			infoPrecios = info;
		}
		
		

};
