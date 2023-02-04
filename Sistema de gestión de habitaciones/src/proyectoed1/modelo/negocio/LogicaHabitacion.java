/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectoed1.modelo.negocio;

import java.awt.image.BufferedImage;
import java.io.BufferedReader;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.RandomAccessFile;
import java.util.StringTokenizer;
import javax.imageio.ImageIO;
import proyectoed1.modelo.dominio.Extra;
import proyectoed1.modelo.dominio.Habitacion;
import proyectoed1.modelo.dominio.ListaExtra;
import proyectoed1.modelo.dominio.ListaHabitacion;
import proyectoed1.modelo.dominio.NodoExtra;
import proyectoed1.modelo.dominio.NodoHabitacion;

/**
 *
 * @author adeve
 */
public class LogicaHabitacion {

    public boolean guardarImagenes(File[] imagenes, String rutaGeneral, int numHab) throws IOException {
        int index = 0;

        for (File img : imagenes) {
            BufferedImage image = ImageIO.read(img);
            ImageIO.write(image, "jpg", new File(rutaGeneral + "\\img\\" + "habitaciones\\" + "hab-" + numHab + "-" + index + ".jpg")); //hab-1001-n
            index++;
        }

        return true;
    }

    public boolean guardarImagenesModificar(File[] imagenes, String rutaGeneral, int numHab, int contador) throws IOException {
        int index = contador - 1;

        for (File img : imagenes) {
            BufferedImage image = ImageIO.read(img);
            ImageIO.write(image, "jpg", new File(rutaGeneral + "\\img\\" + "habitaciones\\" + "hab-" + numHab + "-" + index + ".jpg")); //hab-1001-n
            index++;
        }

        return true;
    }

    public boolean guardarImagenesModificarReinicio(File[] imagenes, String rutaGeneral, int numHab, int contador) throws IOException {
        int index = contador;

        for (File img : imagenes) {
            BufferedImage image = ImageIO.read(img);
            ImageIO.write(image, "jpg", new File(rutaGeneral + "\\img\\" + "habitaciones\\" + "hab-" + numHab + "-" + index + ".jpg")); //hab-1001-n
            index++;
        }

        return true;
    }

    ///agregar
    //parametros: lista, habitacion
    //quien llama esto: controlador
    //desde donde recibe: GUI de habitaciones
    public boolean agregarHabitacion(ListaHabitacion lh, Habitacion h) {
        boolean resultado = false;
        NodoHabitacion nuevo = new NodoHabitacion();

        if (lh.getPrimero() == null || lh.getUltimo() == null) {

            nuevo.setHabitacion(h);
            nuevo.setSiguiente(nuevo);
            nuevo.setAnterior(nuevo);
            lh.setPrimero(nuevo);
            lh.setUltimo(nuevo);
            resultado = true;
        } else {
            NodoHabitacion ultimo = lh.getPrimero().getAnterior(); //el anterior del primero
            nuevo.setHabitacion(h); // se establece el dato
            nuevo.setSiguiente(lh.getPrimero()); //el siguiente de nuevo es el primero
            lh.getPrimero().setAnterior(nuevo);
            nuevo.setAnterior(ultimo);
            ultimo.setSiguiente(nuevo);
            lh.setUltimo(lh.getPrimero().getAnterior());
            resultado = true;
        }
        return resultado;
    }

    /* public boolean eliminarHabitacion(ListaHabitacion lh, Habitacion h){
     boolean resultado = false;
        
     if(lh.getPrimero() == null || lh.getUltimo() == null){
     return false;
     }else{
     NodoHabitacion actual = lh.getPrimero();
     NodoHabitacion primero = lh.getPrimero();
     NodoHabitacion anterior = null;
            
     while(actual.getHabitacion().getNumHabitacion() != h.getNumHabitacion()){
     if(actual.getSiguiente() == primero){
     return false;
     }
     anterior = actual;
     actual = actual.getSiguiente();
     }
            
     if(actual.getSiguiente() == primero && anterior == null){
     lh.setPrimero(null);
     return true;
     }
            
     if(actual== primero){
     anterior = primero.getAnterior();
     primero = primero.getSiguiente();
     anterior.setSiguiente(primero);
     primero.setAnterior(anterior);
     resultado = true;
                
     }
            
     else if(actual.getSiguiente() == primero){
     anterior.setSiguiente(primero);
     primero.setAnterior(anterior);
     resultado = true;
     }
            
     else{
     NodoHabitacion temporal = actual.getSiguiente();
     anterior.setSiguiente(temporal);
     temporal.setAnterior(anterior);
     resultado = true;
     }
     }
        
        
     return resultado;
     }
     */
    //modificar 
    //recibir un objeto totalmente nuevo de tipo habitacion, el id o posicion del nodo
    //y tratar de sustituirlo
    //buscar un nodo en la lista y hacer un nuevo seteo
    //actual = nuevo nodo dato
    public boolean modificarHabitacion(ListaHabitacion lh, Habitacion h) {

        NodoHabitacion primero = lh.getPrimero();
        boolean resultado = false;
        while (primero.getSiguiente() != lh.getPrimero()) {
            if (primero.getHabitacion().getNumHabitacion() == h.getNumHabitacion()) {

                primero.setHabitacion(h);
                resultado = true;
            }
            primero = primero.getSiguiente();
        }

        if (primero.getHabitacion().getNumHabitacion() == h.getNumHabitacion()) {

            primero.setHabitacion(h);
            resultado = true;
        }

        return resultado;
    }

    //eliminar
    public boolean eliminarHabitacion(ListaHabitacion lh, Habitacion h) {

       

        if (lh.getPrimero() == null || lh.getUltimo() == null) {
            return false;
        } else {
             NodoHabitacion primero = lh.getPrimero();
            NodoHabitacion actual = lh.getPrimero();
            NodoHabitacion anterior = null;

            while (actual.getHabitacion().getNumHabitacion() != h.getNumHabitacion()) {
                if (actual.getSiguiente() == primero) {
                    return false;
                } else {
                    anterior = actual;
                    actual = actual.getSiguiente();
                }
            }

            if (actual.getSiguiente() == primero && anterior == null) {
                primero = null;
                return true;
            }

            if (actual == primero) {
                anterior = primero.getAnterior();
                primero = primero.getSiguiente();

                anterior.setSiguiente(primero);
                primero.setAnterior(anterior);
                return true;
            } else if (actual.getSiguiente() == primero) {
                anterior.setSiguiente(primero);
                primero.setAnterior(anterior);
                return true;
            } else {
                NodoHabitacion temporal = actual.getSiguiente();
                anterior.setSiguiente(temporal);
                temporal.setAnterior(anterior);
                return true;
            }
        }
    }

    //consultar por numero habitacion
    //par: lista nucleo de habitaciones, lista auxiliar de por numero, numero hab
    //funcion: recorrer lista nucleo y verificar si es igual a numero hab, llenar lista b
    //recorrer en la gui
    public void consultarPorNumero(ListaHabitacion lh1, ListaHabitacion lh2, int numero) {
        NodoHabitacion primero = lh1.getPrimero();
        while (primero.getSiguiente() != lh1.getPrimero()) {
            if (primero.getHabitacion().getNumHabitacion() == numero) {

                agregarHabitacion(lh2, primero.getHabitacion());
            }
            primero = primero.getSiguiente();
        }

    }

    //consultar por extra
    /*public void consultarPorExtra(ListaHabitacion lh1, ListaHabitacion lh2, String extra) {
     NodoHabitacion primero = lh1.getPrimero();
     while (primero.getSiguiente() != lh1.getPrimero()) {
     NodoExtra primero2 = primero.getHabitacion().getListaExtras().getPrimero();
     while (primero2 != null) {
     if (primero2.getExtra().getDescripcion().equals(extra)) {
     //  System.out.print(primero.getHabitacion().getDescripcion());
     agregarHabitacion(lh2, primero.getHabitacion()); //me va agregar todas las habs que tienen ese extra
     }
     primero2 = primero2.getSiguiente();
     }
     /*if (primero2.getExtra().getDescripcion().equals(extra)) {
     //System.out.print(primero.getHabitacion().getDescripcion());
     agregarHabitacion(lh2, primero.getHabitacion());
     }*/
    /*
     primero = primero.getSiguiente();
     }

     }*/
    public void consultarPorExtra(ListaHabitacion lh1, ListaHabitacion lh2, Extra extra) {
        NodoHabitacion primero = lh1.getPrimero();

        do {
            NodoExtra primero2 = primero.getHabitacion().getListaExtras().getPrimero();
            if (primero.getHabitacion().getListaExtras().getPrimero() == null || primero.getHabitacion().getListaExtras().getUltimo() == null) {
                return;
            } else {
                do {
                    if (primero2.getExtra().getDescripcion().equals(extra.getDescripcion())) {
                        //  System.out.print(primero.getHabitacion().getDescripcion());
                        agregarHabitacion(lh2, primero.getHabitacion()); //me va agregar todas las habs que tienen ese extra
                    }

                    primero2 = primero2.getSiguiente();
                } while (primero2 != null);

            }

            primero = primero.getSiguiente();
        } while (primero != lh1.getPrimero());

    }

    public ListaHabitacion filtrarPorExtras(ListaHabitacion core, String linea) {
        ListaHabitacion auxiliar = new ListaHabitacion();
        NodoHabitacion primero = core.getPrimero();
        String aux = linea.replace("(", "").replace(")", "");
        String[] extras = aux.split("-");
        while (primero.getSiguiente() != core.getPrimero()) {
            NodoExtra nPrimero = primero.getHabitacion().getListaExtras().getPrimero();
            while (nPrimero != null) {

                if (nPrimero.getExtra().getCodigo().equals(extras[0])) {
                    agregarHabitacion(auxiliar, primero.getHabitacion());
                }

                nPrimero = nPrimero.getSiguiente();
            }
            
            
             
            primero = primero.getSiguiente();
        }
        
        NodoExtra nPrimero = primero.getHabitacion().getListaExtras().getPrimero();
        if (nPrimero.getExtra().getCodigo().equals(extras[0])) {
                    agregarHabitacion(auxiliar, primero.getHabitacion());
                }
        
        

        return auxiliar;
    }

    public ListaHabitacion filtrarPorCantidadPersonas(ListaHabitacion core, String linea) {
        ListaHabitacion auxiliar = new ListaHabitacion();
        NodoHabitacion primero = core.getPrimero();

        while (primero.getSiguiente() != core.getPrimero()) {

            if (primero.getHabitacion().getCantidadPersonas() == Integer.parseInt(linea)) {
                agregarHabitacion(auxiliar, primero.getHabitacion());
            }
            primero = primero.getSiguiente();
        }
        if (primero.getHabitacion().getCantidadPersonas() == Integer.parseInt(linea)) {
            agregarHabitacion(auxiliar, primero.getHabitacion());
        }

        return auxiliar;
    }

    //consultar por cantidad de personas
    public void consultarPorPersonas(ListaHabitacion lh1, ListaHabitacion lh2, int cantidad) {
        NodoHabitacion primero = lh1.getPrimero();
        while (primero.getSiguiente() != lh1.getPrimero()) {
            if (primero.getHabitacion().getCantidadPersonas() == cantidad) {

                agregarHabitacion(lh2, primero.getHabitacion());
            }
            primero = primero.getSiguiente();
        }

        if (primero.getHabitacion().getCantidadPersonas() == cantidad) {

            agregarHabitacion(lh2, primero.getHabitacion());
        }
    }

    //guardarArchivo habitacion
    //par: nombrefichero, lista
    //quien llama esto: controlador
    //desde donde recibe: GUI de habitaciones
    public boolean archivarHabitacion(String fichero, Habitacion h) throws IOException {
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
            if (Integer.parseInt(split[0]) == (h.getNumHabitacion())) {
                verificar = true;
                break;
            }
        }

        //sino se encontro, se empieza a construir el nuevo dato
        if (verificar == false) {
            //linea = 
            nuevoID = obtenerNuevoID(fichero) + 1;
            nuevoDato = nuevoID + "," + h.getDescripcion() + "," + h.getPrecio() + "," + h.getCantidadPersonas() + "," + obtenerIDExtras(h) + "," + obtenerNombreImagenes(h);
            raf.writeBytes(nuevoDato);

            raf.writeBytes(System.lineSeparator());

            raf.close();
            agregado = true;
        }

        return agregado;
    }

    public boolean modificarArchivo(String fichero, Habitacion h) throws IOException {
        boolean resultado = false;
        boolean verificar = false;
        int index;
        String linea = "";
        String datoActualizado = "";
        File file = new File(fichero);
        if (!file.exists()) {

            file.createNewFile();
        }

        RandomAccessFile raf
                = new RandomAccessFile(file, "rw");

        while (raf.getFilePointer() < raf.length()) {

            // reading line from the file.
            linea = raf.readLine();

            // splitting the string to get name and
            // number
            String[] split
                    = linea.split(",");
            // if condition to find existence of record.
            if (split[0].equals(String.valueOf(h.getNumHabitacion()))) {
                verificar = true;
                break;
            }

        }

        if (verificar == true) {
            File tmpFile = new File("temp.txt");
            RandomAccessFile tmpraf
                    = new RandomAccessFile(tmpFile, "rw");
            raf.seek(0);

            while (raf.getFilePointer()
                    < raf.length()) {
                linea = raf.readLine();

                index = linea.indexOf(',');

                if (linea.substring(0, index).equals(String.valueOf(h.getNumHabitacion()))) {
                    linea = h.getNumHabitacion() + "," + h.getDescripcion() + "," + h.getPrecio() + "," + h.getCantidadPersonas() + "," + obtenerIDExtras(h) + "," + obtenerNombreImagenes(h);
                    //    linea = h.getNumHabitacion() + "," + h.getDescripcion() + "," + h.getPrecio() + "," + h.getCantidadPersonas();
                }
                tmpraf.writeBytes(linea);
                tmpraf.writeBytes(
                        System.lineSeparator());
            }

            raf.seek(0);
            tmpraf.seek(0);

            while (tmpraf.getFilePointer()
                    < tmpraf.length()) {
                raf.writeBytes(tmpraf.readLine());
                raf.writeBytes(System.lineSeparator());
            }

            raf.setLength(tmpraf.length());
            tmpraf.close();
            raf.close();
            tmpFile.delete();

            System.out.println(" Hab. actualizada. ");
            resultado = true;
        }

        return resultado;
    }

    public boolean eliminarHabitacionArchivo(String fichero, Habitacion h) throws IOException {
        boolean resultado = false;
        boolean verificar = false;
        int index;
        String linea = "";
        String datoActualizado = "";
        File file = new File(fichero);
        if (!file.exists()) {

            file.createNewFile();
        }

        RandomAccessFile raf
                = new RandomAccessFile(file, "rw");

        while (raf.getFilePointer() < raf.length()) {

            // reading line from the file.
            linea = raf.readLine();

            // splitting the string to get name and
            // number
            String[] split
                    = linea.split(",");
            // if condition to find existence of record.
            if (split[0].equals(String.valueOf(h.getNumHabitacion()))) {
                verificar = true;
                break;
            }

        }

        if (verificar == true) {
            File tmpFile = new File("temp.txt");
            RandomAccessFile tmpraf
                    = new RandomAccessFile(tmpFile, "rw");
            raf.seek(0);

            while (raf.getFilePointer()
                    < raf.length()) {
                linea = raf.readLine();

                index = linea.indexOf(',');

                if (linea.substring(0, index).equals(String.valueOf(h.getNumHabitacion()))) {
                    continue;
                }
                tmpraf.writeBytes(linea);
                tmpraf.writeBytes(
                        System.lineSeparator());
            }

            raf.seek(0);
            tmpraf.seek(0);

            while (tmpraf.getFilePointer()
                    < tmpraf.length()) {
                raf.writeBytes(tmpraf.readLine());
                raf.writeBytes(System.lineSeparator());
            }

            raf.setLength(tmpraf.length());
            tmpraf.close();
            raf.close();
            tmpFile.delete();

            System.out.println(" Hab. eliminada ");
            resultado = true;
        }

        return resultado;
    }

    public ListaHabitacion leerFichero() throws IOException {

        ListaHabitacion lhab = new ListaHabitacion();
        File archivo = new File("habitaciones.txt");
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
//            System.out.print(split[4]+","+split[5]);
            Habitacion h = new Habitacion();
            h.setNumHabitacion(Integer.parseInt(split[0]));
            h.setDescripcion(split[1]);
            h.setPrecio(Double.parseDouble(split[2]));
            h.setCantidadPersonas(Integer.parseInt(split[3]));
            h.setListaExtras(obtenerListaExtra(split[4]));
            h.setImagenesNombres(obtenerImagenes(split[5]));
            agregarHabitacion(lhab, h);

        }

        raf.close();

        return lhab;
    }

    /*public String[] obtenerImagenNombre(String linea){
        
     }*/
    public static String[] obtenerImagenes(String linea) {
        String aux = linea.replace("(", "").replace(")", "");
        String[] imgs = aux.split("/");

        return imgs;
    }

    public ListaExtra obtenerListaExtra(String linea) throws IOException {

        ListaExtra auxL = new ListaExtra();
        String aux = linea.replace("(", "").replace(")", "");
        String[] extras = aux.split("-");

        int i = 0;
        for (String s : extras) {
            new LogicaExtra().agregarExtra(auxL, obtenerNodoExtra(s));

        }

        return auxL;

    }

    /*
     public File[] obtenerListaImagenes(String linea) throws IOException {

     File[] auxL;
     String aux = linea.replace("(", "").replace(")", "");
     String[] extras = aux.split("-");

     int i = 0;
     for (String s : extras) {
     new LogicaExtra().agregarExtra(auxL, obtenerNodoExtra(s));

     }

     return auxL;

     }
     */
    public Extra obtenerNodoExtra(String codigo) throws IOException {
        ListaExtra le = new LogicaExtra().leerFichero();

        NodoExtra primero = le.getPrimero();

        while (primero != null) {
            if (codigo.equals(primero.getExtra().getCodigo())) {
                return primero.getExtra();
            }

            primero = primero.getSiguiente();

        }

        return primero.getExtra();
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

    //OBTIENE LOS ID DE LAS EXTRAS
    public String obtenerIDExtras(Habitacion h) {
        String extras = "";
        NodoExtra primero = h.getListaExtras().getPrimero();
        extras += "(";
        do {
            extras += primero.getExtra().getCodigo() + "-";

            primero = primero.getSiguiente();
        } while (primero != null);

        return quitarUltimoCaracter(extras) + ")";

    }

    public String obtenerNombreImagenes(Habitacion h) {
        String imagenes = "";
        int index = 0;
        imagenes = "(";
        for (File f : h.getImagenes()) {
            imagenes += "hab-" + h.getNumHabitacion() + "-" + index + ".jpg" + "/";
            index++;
        }
        return quitarUltimoCaracter(imagenes) + ")";
    }

    //REMUEVE ULTIMO CARACTER
    private String quitarUltimoCaracter(String s) {

        return s.substring(0, s.length() - 1);
    }

    public void imprimirLista(ListaHabitacion l) {
        NodoHabitacion primero = l.getPrimero();
        while (primero.getSiguiente() != l.getPrimero()) {
            System.out.printf(primero.getHabitacion().getNumHabitacion() + "-" + primero.getHabitacion().getDescripcion() + " ");
            primero = primero.getSiguiente();
        }
        System.out.printf(primero.getHabitacion().getNumHabitacion() + "-" + primero.getHabitacion().getDescripcion() + " ");
    }

    //ORDENAMIENTO
    public void ordenarAscNumHabitacion(ListaHabitacion lh) {
        NodoHabitacion actual = lh.getPrimero();
        NodoHabitacion index = null;
        NodoHabitacion primero = lh.getPrimero();
        Habitacion temp;
        if (lh.getPrimero() == null) {
            return;
        } else {
            do {
                index = actual.getSiguiente();

                while (index != primero) {
                    if (actual.getHabitacion().getNumHabitacion() > index.getHabitacion().getNumHabitacion()) {
                        temp = actual.getHabitacion();
                        actual.setHabitacion(index.getHabitacion());
                        index.setHabitacion(temp);
                    }
                    index = index.getSiguiente();
                }
                actual = actual.getSiguiente();
            } while (actual.getSiguiente() != primero);

        }
    }

    public void ordenarDescNumHabitacion(ListaHabitacion lh) {
        NodoHabitacion actual = lh.getUltimo();
        NodoHabitacion index = null;
        NodoHabitacion ultimo = lh.getUltimo();
        Habitacion temp;
        if (lh.getUltimo() == null || lh.getPrimero() == null) {
            return;
        } else {
            do {
                index = actual.getAnterior();

                while (index != ultimo) {
                    if (actual.getHabitacion().getNumHabitacion() > index.getHabitacion().getNumHabitacion()) {
                        temp = actual.getHabitacion();
                        actual.setHabitacion(index.getHabitacion());
                        index.setHabitacion(temp);
                    }
                    index = index.getAnterior();
                }
                actual = actual.getAnterior();
            } while (actual.getAnterior() != ultimo);

        }
    }

    public void ordenarAscCantPersonas(ListaHabitacion lh) {
        NodoHabitacion actual = lh.getPrimero();
        NodoHabitacion index = null;
        NodoHabitacion primero = lh.getPrimero();
        Habitacion temp;
        if (lh.getPrimero() == null) {
            return;
        } else {
            do {
                index = actual.getSiguiente();

                while (index != primero) {
                    if (actual.getHabitacion().getCantidadPersonas() > index.getHabitacion().getCantidadPersonas()) {
                        temp = actual.getHabitacion();
                        actual.setHabitacion(index.getHabitacion());
                        index.setHabitacion(temp);
                    }
                    index = index.getSiguiente();
                }
                actual = actual.getSiguiente();
            } while (actual.getSiguiente() != primero);

        }
    }

    public void ordenarDescCantPersonas(ListaHabitacion lh) {
        NodoHabitacion actual = lh.getUltimo();
        NodoHabitacion index = null;
        NodoHabitacion ultimo = lh.getUltimo();
        Habitacion temp;
        if (lh.getUltimo() == null || lh.getPrimero() == null) {
            return;
        } else {
            do {
                index = actual.getAnterior();

                while (index != ultimo) {
                    if (actual.getHabitacion().getCantidadPersonas() > index.getHabitacion().getCantidadPersonas()) {
                        temp = actual.getHabitacion();
                        actual.setHabitacion(index.getHabitacion());
                        index.setHabitacion(temp);
                    }
                    index = index.getAnterior();
                }
                actual = actual.getAnterior();
            } while (actual.getAnterior() != ultimo);

        }
    }

    public void ordenarAscPrecio(ListaHabitacion lh) {
        NodoHabitacion actual = lh.getPrimero();
        NodoHabitacion index = null;
        NodoHabitacion primero = lh.getPrimero();
        Habitacion temp;
        if (lh.getPrimero() == null) {
            return;
        } else {
            do {
                index = actual.getSiguiente();

                while (index != primero) {
                    if (actual.getHabitacion().getPrecio() > index.getHabitacion().getPrecio()) {
                        temp = actual.getHabitacion();
                        actual.setHabitacion(index.getHabitacion());
                        index.setHabitacion(temp);
                    }
                    index = index.getSiguiente();
                }
                actual = actual.getSiguiente();
            } while (actual.getSiguiente() != primero);

        }
    }

    public void ordenarDescPrecio(ListaHabitacion lh) {
        NodoHabitacion actual = lh.getUltimo();
        NodoHabitacion index = null;
        NodoHabitacion ultimo = lh.getUltimo();
        Habitacion temp;
        if (lh.getUltimo() == null || lh.getPrimero() == null) {
            return;
        } else {
            do {
                index = actual.getAnterior();

                while (index != ultimo) {
                    if (actual.getHabitacion().getPrecio() > index.getHabitacion().getPrecio()) {
                        temp = actual.getHabitacion();
                        actual.setHabitacion(index.getHabitacion());
                        index.setHabitacion(temp);
                    }
                    index = index.getAnterior();
                }
                actual = actual.getAnterior();
            } while (actual.getAnterior() != ultimo);

        }
    }

    //OBTENER UNA HABITACION
    public NodoHabitacion obtenerHabitacion(int posicion, ListaHabitacion lh) {
        NodoHabitacion actual = lh.getPrimero();
        NodoHabitacion primero = lh.getPrimero();
        int contador = 0;

        while (actual.getSiguiente() != primero) {
            if (contador == posicion) {
                return actual;
            }
            contador++;
            actual = actual.getSiguiente();
        }

        return actual;
    }

    public NodoHabitacion obtenerHabitacionCombo(int id, ListaHabitacion lh) {
        NodoHabitacion actual = lh.getPrimero();
        NodoHabitacion primero = lh.getPrimero();
        int contador = 0;

        while (actual.getSiguiente() != primero) {
            if (actual.getHabitacion().getNumHabitacion() == id) {
                return actual;
            }
            contador++;
            actual = actual.getSiguiente();
        }

        return actual;
    }

    //OBTENER UNA HABITACION
    public Habitacion obtenerHabitacionModificar(int id, ListaHabitacion lh) {
        NodoHabitacion actual = lh.getPrimero();
        NodoHabitacion primero = lh.getPrimero();
        int contador = 0;

        while (actual.getSiguiente() != primero) {
            if (actual.getHabitacion().getNumHabitacion() == id) {
                return actual.getHabitacion();
            }
            actual = actual.getSiguiente();
        }

        if (actual.getHabitacion().getNumHabitacion() == id) {
            return actual.getHabitacion();
        }

        return actual.getHabitacion();
    }

    public boolean verificarExistenciaHabitacion(int id, ListaHabitacion lh) {
        NodoHabitacion actual = lh.getPrimero();
        NodoHabitacion primero = lh.getPrimero();
        boolean resultado = false;
        while (actual.getSiguiente() != primero) {
            if (actual.getHabitacion().getNumHabitacion() == id) {
                resultado = true;
            }
            actual = actual.getSiguiente();
        }
        if (actual.getHabitacion().getNumHabitacion() == id) {
            resultado = true;
        }

        return resultado;
    }

    //OBTENER TAMAÑO DE LISTA
    public int obtenerTamanioLista(ListaHabitacion lh) {
        NodoHabitacion actual = lh.getPrimero();
        NodoHabitacion primero = lh.getPrimero();
        int contador = 0;

        while (actual.getSiguiente() != primero) {

            contador++;
            actual = actual.getSiguiente();
        }

        return contador;
    }

    public static void main(String[] args) throws IOException {
        //    ListaExtra le = new ListaExtra();
        //      le.setPrimero(new NodoExtra(new Extra("999", "Comida"),null));
//      boolean res =  archivarHabitacion("habitaciones.txt", new Habitacion(1007, "MOD.Axel", 1995, 3, le, new ListaImagen()));
        //   System.out.print(res);
        String linea = "(hab-1005-0.jpg/hab-1005-1.jpg)";
        String aux1 = linea.replace("(", "").replace(")", "");
        String[] imgs = aux1.split("/");

        String[] aux = obtenerImagenes("(hab-1005-0.jpg/hab-1005-1.jpg)");

        for (String s : aux) {
            System.out.print(s + "\n");
        }

    }

}
