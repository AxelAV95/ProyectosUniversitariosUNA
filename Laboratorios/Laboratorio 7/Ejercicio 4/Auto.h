class Auto{
	private:
		string marca;
		int modelo;
		string color;
		int precioInicial;
		string kilometraje;
	
	public:
		int calcularPrecioVenta(int p, int k);
		int calcularAntiguedad();
};
