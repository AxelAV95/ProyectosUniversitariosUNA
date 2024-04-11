#include <iostream>
#include <fstream>
using namespace std;


int main(int argc, char** argv) {
	
	ofstream fs("saludar.txt");
	
	fs << "Hola mundo!" << endl;
	fs.close();
	
	
	return 0;
}
