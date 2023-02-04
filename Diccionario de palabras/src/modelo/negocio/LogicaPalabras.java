/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package modelo.negocio;

import java.io.File;
import java.io.IOException;
import java.io.RandomAccessFile;
import modelo.dominio.ListaPalabras;
import modelo.dominio.NodoPalabra;
import java.io.PrintWriter;

/**
 *
 * @author adeve
 */
public class LogicaPalabras {

    /*
     Funcionalidad: Agrega palabras a la lista de palabras de un nodo letra de la lista principal
     Parámetros que recibe: Lista de palabras, palabra
     Parámetros que regresa: verdadero o false
     */
    public boolean agregarPalabra(ListaPalabras le, String s) {

        NodoPalabra nuevo = new NodoPalabra();

        boolean respuesta = false;

        if (le.getPrimero() == null && le.getUltimo() == null) {
            nuevo.setPalabra(s);
            nuevo.setSiguiente(null);
            le.setPrimero(nuevo);
            le.setUltimo(nuevo);
            respuesta = true;
        } else {
            //  nuevo.setPalabra(e);
            nuevo.setPalabra(s);
            nuevo.setSiguiente(null);
            le.getUltimo().setSiguiente(nuevo);
            le.setUltimo(nuevo);
            respuesta = true;
        }

        return respuesta;
    }

    /*
     Funcionalidad: Verifica si la palabra ya fue ingresada
     Parámetros que recibe: Lista de palabras, string con la palabra
     Parámetros que regresa: verdadero o false
     */
    public boolean verificarPalabra(ListaPalabras lp, String palabra) {
        NodoPalabra np = lp.getPrimero();
        boolean resultado = false;
        while (np != null) {
            if (np.getPalabra().equals(palabra)) {
                resultado = true;
            }
            np = np.getSiguiente();
        }
        return resultado;
    }

    /*
     Funcionalidad:Obtiene un nodo de la lista de palabras que contenga una palabra pasada por parametro
     Parámetros que recibe: Lista de palabras, string con la palabra
     Parámetros que regresa: Nodo con la palabra
     */
    public NodoPalabra obtenerNodoPalabra(ListaPalabras lp, String palabra) {
        NodoPalabra np = lp.getPrimero();
        NodoPalabra aux = null;
        boolean resultado = false;
        while (np != null) {
            if (np.getPalabra().equals(palabra)) {
                aux = np;
            }
            np = np.getSiguiente();
        }
        return aux;
    }

    /*
     Funcionalidad: Almacena las palabras agregadas a un archivo
     Parámetros que recibe: Nombre del fichero, palabras almacenadas
     Parámetros que regresa: verdadero o false
     */
    public boolean archivarPalabras(String fichero, String s) throws IOException {

        String linea = "";
        String nuevoDato = "";
        int nuevoID = 0;
        boolean verificar = false;
        boolean agregado = false;
        PrintWriter writer = new PrintWriter(fichero);
        writer.print("");
        writer.close();

        File archivo = new File(fichero);

        if (!archivo.exists()) {
            //Sino existe, se crear
            archivo.createNewFile();
        }
        //abro el archivo en modo de lectura y escritura
        RandomAccessFile raf = new RandomAccessFile(archivo, "rw");

        raf.writeBytes(s);

        raf.writeBytes(System.lineSeparator());

        raf.close();
        agregado = true;

        return agregado;
    }

    /*
     Funcionalidad: Imprime todos los nodos de la lista de palabras
     Parámetros que recibe: Lista de palabras
     Parámetros que regresa: ninguno
     */
    public void imprimir(ListaPalabras l) {
        NodoPalabra np = l.getPrimero();

        while (np != null) {

            System.out.print(np.getPalabra() + " ");

            np = np.getSiguiente();
        }

    }
}
