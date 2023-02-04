/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectoed1.modelo.negocio;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.RandomAccessFile;
import java.util.StringTokenizer;
import proyectoed1.modelo.dominio.Extra;
import proyectoed1.modelo.dominio.ListaExtra;
import proyectoed1.modelo.dominio.NodoExtra;

/**
 *
 * @author adeve
 */
public class LogicaExtra {

    //agregar extra
    public boolean agregarExtra(ListaExtra le, Extra e) {
        NodoExtra nuevo = new NodoExtra();

        boolean respuesta = false;

        if (le.getPrimero() == null && le.getUltimo() == null) {
            nuevo.setExtra(e);
            nuevo.setSiguiente(null);
            le.setPrimero(nuevo);
            le.setUltimo(nuevo);
            respuesta = true;
        } else {
            nuevo.setExtra(e);
            le.getUltimo().setSiguiente(nuevo);
            le.setUltimo(nuevo);
            respuesta = true;
        }

        return respuesta;
    }

    public ListaExtra leerFichero() throws IOException {

        ListaExtra lextra = new ListaExtra();
        File archivo = new File("extras.txt");
        boolean verificar = false;
        String linea = "";
        if (!archivo.exists()) {
            //Sino existe, se crear
            archivo.createNewFile();
        }

        //abro el archivo en modo de lectura y escritura
        RandomAccessFile raf = new RandomAccessFile(archivo, "rw");

        //recorro el archivo para verificar que no exista la habitacion
        while (raf.getFilePointer() < raf.length()) {
            linea = raf.readLine();

            //obtengo los datos de la linea y los guardo en un array
            String[] split = linea.split(",");

            agregarExtra(lextra, new Extra(split[0], split[1]));

        }
        raf.close();
        return lextra;
    }

    public boolean archivarExtra(String fichero, Extra e) throws IOException {
        String linea = "";
        String nuevoDato = "";
        int nuevoID = 0;
        boolean verificar = false;
        boolean agregado = false;
        File archivo = new File(fichero);

        if (!archivo.exists()) {
            //Sino existe, se crear
            archivo.createNewFile();
        }
        //abro el archivo en modo de lectura y escritura
        RandomAccessFile raf = new RandomAccessFile(archivo, "rw");

        //recorro el archivo para verificar que no exista la habitacion
        while (raf.getFilePointer() < raf.length()) {
            linea = raf.readLine();

            //obtengo los datos de la linea y los guardo en un array
            String[] split = linea.split(",");

            //verifico que el ID de la habitacion no sea igual
            if (split[0] == (e.getCodigo())) {
                verificar = true;
                break;
            }
        }

        //sino se encontro, se empieza a construir el nuevo dato
        if (verificar == false) {
            //linea = 
            nuevoID = obtenerNuevoID(fichero) + 1;
            nuevoDato = nuevoID + "," +e.getDescripcion();
            raf.writeBytes(nuevoDato);

            raf.writeBytes(System.lineSeparator());

            raf.close();
            agregado = true;
        }

        return agregado;
    }

    //OBTIENE NUEVO ID DEL FICHERO
    public int obtenerNuevoID(String fichero) throws FileNotFoundException, IOException {
        File file = new File(fichero);
        String linea = "";
        int nuevoID = 0;

        InputStreamReader streamReader
                = new InputStreamReader(new FileInputStream(file));

        BufferedReader br = new BufferedReader(streamReader);
        while (br.ready()) {
            linea = br.readLine();

        }

        if (linea.equals("")) {
            nuevoID = 1000;
        } else {
            StringTokenizer st = new StringTokenizer(linea, ",");
            nuevoID = Integer.parseInt(st.nextToken());
        }

        br.close();
        streamReader.close();
        return nuevoID;
    }

    public void imprimirLista(ListaExtra le) {
        //Node current will point to head  
        NodoExtra actual = le.getPrimero();
        if (le.getPrimero() == null && le.getUltimo() == null) {
            System.out.println("Lista vacia");
            return;
        } else {
            while (actual != null) {

                System.out.print(actual.getExtra().getCodigo() + " ");
                actual = actual.getSiguiente();
            }
        }

    }
}
