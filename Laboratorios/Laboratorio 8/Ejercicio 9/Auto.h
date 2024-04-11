class Auto{
	
	private:
		string marca;
		string modelo;
		string color;
	
	public:
		Auto(){}
		void acelerar();
		void frenar();
		
		string getMarca(){
			return marca;
		}
		string getModelo(){
			return modelo;
		}
		string getColor(){
			return color;
		}
		void setMarca(string name){
			marca = name;
		}
		void setModelo(string model){
			modelo = model;
		}
		void setColor(string col){
			color = col;
		}
		
};
