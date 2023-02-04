/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectoed1.modelo.negocio;

import com.google.zxing.BarcodeFormat;
import com.google.zxing.BinaryBitmap;
import com.google.zxing.MultiFormatReader;
import com.google.zxing.NotFoundException;
import com.google.zxing.Result;
import com.google.zxing.Writer;
import com.google.zxing.WriterException;
import com.google.zxing.client.j2se.BufferedImageLuminanceSource;
import com.google.zxing.common.BitMatrix;
import com.google.zxing.common.HybridBinarizer;
import com.google.zxing.qrcode.QRCodeWriter;
import java.awt.image.BufferedImage;
import java.io.BufferedReader;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.RandomAccessFile;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.StringTokenizer;
import javax.imageio.ImageIO;
import proyectoed1.modelo.datos.Datos;
import proyectoed1.modelo.dominio.Cliente;
import proyectoed1.modelo.dominio.Habitacion;
import proyectoed1.modelo.dominio.ListaHabitacion;
import proyectoed1.modelo.dominio.ListaReserva;
import proyectoed1.modelo.dominio.NodoHabitacion;
import proyectoed1.modelo.dominio.NodoReserva;
import proyectoed1.modelo.dominio.Reserva;

/**
 *
 * @author adeve
 */
public class LogicaReserva {

    //agregar
    public boolean agregarReserva(ListaReserva lr, Reserva r) {

        NodoReserva nuevo = new NodoReserva();
        boolean respuesta = false;

        if (lr.getPrimero() == null && lr.getUltimo() == null) {
            nuevo.setReserva(r);
            nuevo.setSiguiente(null);
            lr.setPrimero(nuevo);
            lr.setUltimo(nuevo);
            respuesta = true;
        } else {
            nuevo.setReserva(r);

            lr.getUltimo().setSiguiente(nuevo);
            lr.setUltimo(nuevo);
            respuesta = true;
        }

        return respuesta;
    }

    public boolean eliminarReserva(ListaReserva lr, int reservaid) {
        boolean resultado = false;
        NodoReserva temporal = null;
        NodoReserva primero = lr.getPrimero();
        if (lr.getPrimero().getReserva().getNumeroReservacion() == reservaid) {
            temporal = primero;
            primero = primero.getSiguiente();
        } else {
            NodoReserva actual = primero;

            while (actual.getSiguiente() != null) {
                if (actual.getSiguiente().getReserva().getNumeroReservacion() == reservaid) {
                    temporal = actual.getSiguiente();
                    actual.setSiguiente(actual.getSiguiente().getSiguiente());
                    resultado = true;
                    break;
                } else {
                    actual = actual.getSiguiente();
                }
            }

        }

        return resultado;
    }

    public boolean eliminarReservaArchivo(String fichero, Reserva r) throws IOException {
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
            if (split[0].equals(String.valueOf(r.getNumeroReservacion()))) {
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

                if (linea.substring(0, index).equals(String.valueOf(r.getNumeroReservacion()))) {
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

            resultado = true;
        }

        return resultado;
    }

    public boolean eliminarVehiculo(ListaReserva l, int reservaid) {

        NodoReserva temporal = l.getPrimero();
        NodoReserva anterior = null;

        if (l.getPrimero() == null || l.getUltimo() == null) {
            return false;
        } else {
            if (temporal != null && temporal.getReserva().getNumeroReservacion() == reservaid) {
                l.setPrimero(temporal.getSiguiente());
                return true;
            } else {
                if (l.getUltimo().getReserva().getNumeroReservacion() == reservaid) {
                    l.setUltimo(null);
                    return true;
                } else {
                    while (temporal != null && temporal.getReserva().getNumeroReservacion() == reservaid) {
                        anterior = temporal;
                        temporal = temporal.getSiguiente();

                    }

                    if (temporal == null) {
                        return false;
                    }

                    anterior.setSiguiente(temporal.getSiguiente());
                }

                return true;
            }

        }

    }

    public boolean archivarReserva(String fichero, Reserva r) throws IOException {
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

            //verifico que el ID de la reserva no sea igual
            if (Integer.parseInt(split[0]) == (r.getNumeroReservacion())) {
                verificar = true;
                break;
            }
        }

        //sino se encontro, se empieza a construir el nuevo dato
        if (verificar == false) {
            //linea = 
            nuevoID = obtenerNuevoID(fichero) + 1;
            //  nuevoDato = nuevoID + "," + crearFechaAString(r.getFechaActual()) + "," + crearFechaAString(r.getFechaInicio()) + "," + crearFechaAString(r.getFechaFinal()) + "," + r.getCliente().getCedula() + "," + r.getCliente().getNombre();
            nuevoDato = nuevoID + "," + crearFechaAString(r.getFechaActual()) + "," + crearFechaAString(r.getFechaInicio()) + "," + crearFechaAString(r.getFechaFinal()) + "," + r.getCliente().getCedula() + "," + r.getCliente().getNombre() + "," + obtenerIDHabitaciones(r);
            // nuevoDato = nuevoID + "," + h.getDescripcion() + "," + h.getPrecio() + "," + h.getCantidadPersonas() + "," + obtenerIDExtras(h) + "," + obtenerNombreImagenes(h);
            raf.writeBytes(nuevoDato);

            raf.writeBytes(System.lineSeparator());

            raf.close();
            agregado = true;
        }

        return agregado;
    }

    public boolean archivarCancelados(String fichero, Reserva r) throws IOException {
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

            //verifico que el ID de la reserva no sea igual
            if (Integer.parseInt(split[0]) == (r.getNumeroReservacion())) {
                verificar = true;
                break;
            }
        }

        //sino se encontro, se empieza a construir el nuevo dato
        if (verificar == false) {
            //linea = 
            nuevoID = obtenerNuevoID(fichero) + 1;
            //  nuevoDato = nuevoID + "," + crearFechaAString(r.getFechaActual()) + "," + crearFechaAString(r.getFechaInicio()) + "," + crearFechaAString(r.getFechaFinal()) + "," + r.getCliente().getCedula() + "," + r.getCliente().getNombre();
            nuevoDato = nuevoID + r.getNumeroReservacion() + "," + crearFechaAString(r.getFechaActual()) + "," + crearFechaAString(r.getFechaInicio()) + "," + crearFechaAString(r.getFechaFinal()) + "," + r.getCliente().getCedula() + "," + r.getCliente().getNombre() + "," + obtenerIDHabitaciones(r);
            // nuevoDato = nuevoID + "," + h.getDescripcion() + "," + h.getPrecio() + "," + h.getCantidadPersonas() + "," + obtenerIDExtras(h) + "," + obtenerNombreImagenes(h);
            raf.writeBytes(nuevoDato);

            raf.writeBytes(System.lineSeparator());

            raf.close();
            agregado = true;
        }

        return agregado;
    }

    public boolean modificarArchivo(String fichero, Reserva r) throws IOException {
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
            if (split[0].equals(String.valueOf(r.getNumeroReservacion()))) {
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

                if (linea.substring(0, index).equals(String.valueOf(r.getNumeroReservacion()))) {
                    linea = r.getNumeroReservacion() + "," + crearFechaAString(r.getFechaActual()) + "," + crearFechaAString(r.getFechaInicio()) + "," + crearFechaAString(r.getFechaFinal()) + "," + r.getCliente().getCedula() + "," + r.getCliente().getNombre() + "," + obtenerIDHabitaciones(r);
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

    public static ListaHabitacion obtenerListaHabitaciones(String linea, ListaHabitacion lh) throws IOException, ParseException {

        ListaHabitacion auxL = new ListaHabitacion();
        String aux = linea.replace("(", "").replace(")", "");
        String[] habitaciones = aux.split("-");

        int i = 0;
        for (String s : habitaciones) {
            new LogicaHabitacion().agregarHabitacion(auxL, obtenerNodoHabitacion(s, lh));

        }

        return auxL;

    }

    public static Habitacion obtenerNodoHabitacion(String codigo, ListaHabitacion le) throws IOException, ParseException {
        // ListaHabitacion le = new LogicaHabitacion().leerFichero();

        NodoHabitacion primero = le.getPrimero();

        while (primero != null) {
            if (Integer.parseInt(codigo) == primero.getHabitacion().getNumHabitacion()) {
                return primero.getHabitacion();
            }

            primero = primero.getSiguiente();

        }

        return primero.getHabitacion();
    }

    public Date crearFecha(String fechaAux) throws ParseException {

        SimpleDateFormat sdf = new SimpleDateFormat("dd/MM/yyyy");
        Date fechaFormateada = sdf.parse(fechaAux);

        return fechaFormateada;

    }

    public ListaReserva leerFichero(ListaHabitacion lh) throws IOException, ParseException {

        ListaReserva lres = new ListaReserva();
        File archivo = new File("reservaciones.txt");
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

            Reserva r = new Reserva();
            r.setNumeroReservacion(Integer.parseInt(split[0]));
            r.setFechaActual(crearFecha(split[1]));
            r.setFechaInicio(crearFecha(split[2]));
            r.setFechaFinal(crearFecha(split[3]));
            r.setCliente(new Cliente(split[4], split[5]));
            r.setListaHabitaciones(obtenerListaHabitaciones(split[6], lh));
            //r.setListaHabitaciones(ob);
            agregarReserva(lres, r);

        }

        raf.close();

        return lres;
    }

    public ListaReserva leerFicheroCanceladas(ListaHabitacion lh) throws IOException, ParseException {

        ListaReserva lres = new ListaReserva();
        File archivo = new File("cancelaciones.txt");
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

            Reserva r = new Reserva();
            r.setNumeroReservacion(Integer.parseInt(split[0]));
            r.setFechaActual(crearFecha(split[1]));
            r.setFechaInicio(crearFecha(split[2]));
            r.setFechaFinal(crearFecha(split[3]));
            r.setCliente(new Cliente(split[4], split[5]));
            r.setListaHabitaciones(obtenerListaHabitaciones(split[6], lh));
            //r.setListaHabitaciones(ob);
            agregarReserva(lres, r);

        }

        raf.close();

        return lres;
    }

    public String obtenerIDHabitaciones(Reserva r) {
        String habitaciones = "";
        NodoHabitacion primero = r.getListaHabitaciones().getPrimero();
        habitaciones += "(";
        do {
            habitaciones += primero.getHabitacion().getNumHabitacion() + "-";

            primero = primero.getSiguiente();
        } while (primero != r.getListaHabitaciones().getPrimero());

        return quitarUltimoCaracter(habitaciones) + ")";

    }

    private String quitarUltimoCaracter(String s) {

        return s.substring(0, s.length() - 1);
    }

    public String crearFechaAString(Date fechaAux) {
        SimpleDateFormat sdf = new SimpleDateFormat("dd/MM/yyyy");

        String fecha = sdf.format(fechaAux);

        return fecha;
    }

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
            nuevoID = 10000;
        } else {
            StringTokenizer st = new StringTokenizer(linea, ",");
            nuevoID = Integer.parseInt(st.nextToken());
        }

        br.close();
        streamReader.close();

        return nuevoID;
    }

    //modificar
    public boolean modificarReserva(ListaReserva lr, Reserva r) {
        boolean resultado = false;
        NodoReserva primero = lr.getPrimero();
        while (primero != null) {
            if (primero.getReserva().getNumeroReservacion() == r.getNumeroReservacion()) {

                primero.setReserva(r);
                resultado = true;

            }
            primero = primero.getSiguiente();
        }

        return resultado;
    }

    public String leerReservaQR(String ruta) throws IOException, NotFoundException {
        BufferedImage readerImage = ImageIO.read(new FileInputStream(ruta));
        BinaryBitmap binaryBitmap = new BinaryBitmap(new HybridBinarizer(new BufferedImageLuminanceSource(readerImage)));
        Result resultObj = new MultiFormatReader().decode(binaryBitmap);

        return resultObj.getText();
    }

    public boolean generarReservaQR(Reserva r, String rutaGeneral) throws WriterException, IOException {
        BitMatrix matrix;
        Writer escritor = new QRCodeWriter();

        matrix = escritor.encode(String.valueOf(r.getNumeroReservacion()), BarcodeFormat.QR_CODE, 300, 300);
        BufferedImage imagen = new BufferedImage(300, 300, BufferedImage.TYPE_INT_RGB);

        for (int y = 0; y < 300; y++) {
            for (int x = 0; x < 300; x++) {
                int grayValue = (matrix.get(x, y) ? 0 : 1) & 0xff;
                imagen.setRGB(x, y, (grayValue == 0 ? 0 : 0xFFFFFF));
            }
        }

        String ruta = rutaGeneral + "\\img\\qr\\" + "res-" + r.getNumeroReservacion() + ".png";
        FileOutputStream codigo = new FileOutputStream(ruta);
        boolean resultado = ImageIO.write(imagen, "png", codigo);

        codigo.close();
        return resultado;
    }

    //verificar
    public NodoReserva obtenerReservaQR(ListaReserva lr, String id) {
        NodoReserva temp = new NodoReserva();
        NodoReserva primero = lr.getPrimero();

        //ESCANEAR ESE ID Y CONVERTIRLA EN STRING A INT
        while (primero != null) {

            if (primero.getReserva().getNumeroReservacion() == Integer.parseInt(id)) {
                temp = primero;
            }

            primero = primero.getSiguiente();
        }

        //BUSCAR EN LA LISTA EL NODO REFERENCIADO A ESE INT
        //DEVOLVER NODO
        return temp;
    }

    public boolean verificarRangoFechas(Date min, Date max, Date solicitada) {
        boolean verificacion = false;

        if ((solicitada.after(min) && solicitada.before(max)) || solicitada.compareTo(min) == 0 || solicitada.compareTo(max) == 0) {
            verificacion = true;
        }

        return verificacion;
    }

    public ListaReserva obtenerListaClienteCedula(ListaReserva lr, String cedula) {
        NodoReserva primero = lr.getPrimero();
        ListaReserva aux = new ListaReserva();
        while (primero != null) {

            if (primero.getReserva().getCliente().getCedula().equals(cedula)) {
                agregarReserva(aux, primero.getReserva());
            }

            primero = primero.getSiguiente();
        }

        return aux;
    }

    public ListaReserva obtenerListaFechas(ListaReserva lr, Date fecha1, Date fecha2) {
        NodoReserva primero = lr.getPrimero();
        ListaReserva aux = new ListaReserva();
        while (primero != null) {

            if (verificarRangoFechas(fecha1, fecha2, primero.getReserva().getFechaInicio())) {
                agregarReserva(aux, primero.getReserva());
            }

            primero = primero.getSiguiente();
        }

        return aux;
    }

    public boolean verificarFechas(ListaReserva lr, String id, Date solicitada) {
        NodoReserva primero = lr.getPrimero();
        boolean resultado = false;
        boolean busquedaHabitacion = false;
        boolean busquedaFecha = false;
        while (primero != null) {
            NodoHabitacion primeroHabitacion = primero.getReserva().getListaHabitaciones().getPrimero();
            while (primeroHabitacion.getSiguiente() != primero.getReserva().getListaHabitaciones().getPrimero()) {

                if (primeroHabitacion.getHabitacion().getNumHabitacion() == Integer.parseInt(id)) {
                    busquedaHabitacion = true; // busco la habitacion
                }

                primeroHabitacion = primeroHabitacion.getSiguiente();
            }
            if (primeroHabitacion.getHabitacion().getNumHabitacion() == Integer.parseInt(id)) {
                busquedaHabitacion = true;
            }
            System.out.print(primero.getReserva().getFechaFinal());
            if (verificarRangoFechas(primero.getReserva().getFechaInicio(), primero.getReserva().getFechaFinal(), solicitada) == true) {
                busquedaFecha = true; // busco la fecha o si esta dentro de ese rango
            }

            primero = primero.getSiguiente();
        }

        return resultado = busquedaHabitacion == true && busquedaFecha == true;
    }
    //archivar
    //leer

    //imprimir
    public void imprimirLista(ListaReserva l) {
        //Node current will point to head  
        NodoReserva actual = l.getPrimero();
        if (l.getPrimero() == null && l.getUltimo() == null) {
            System.out.println("Lista vacia");
            return;
        } else {
            while (actual != null) {

                new LogicaHabitacion().imprimirLista(actual.getReserva().getListaHabitaciones());
                // System.out.print(actual.getReserva().getListaHabitaciones()+ " ");  
                actual = actual.getSiguiente();
            }
        }

    }

    public static void main(String[] args) throws IOException, ParseException {
    //      Datos.iniciarListaHabitaciones();
        // ListaHabitacion lr = obtenerListaHabitaciones("(1007)", Datos.getListaHabitaciones());

        //  new LogicaHabitacion().imprimirLista(lr);
        /*String aux = "(1007-1001)".replace("(", "").replace(")", "");
         String[] habitaciones = aux.split("-");
        
         for(String s : habitaciones){
         System.out.print(s);
         }*/
        Datos.iniciarListaHabitaciones();
        Datos.iniciarListaReservas();

//          System.out.print("Resultado: "+verificarFechas(Datos.getListaReservas(), "1007", crearFecha("06/11/2021")));
        /*   LogicaHabitacion lh = new LogicaHabitacion();
         Habitacion h = new Habitacion();
         h.setNumHabitacion(1007);
         ListaHabitacion lhe = new ListaHabitacion();
         boolean rest =  lh.agregarHabitacion(lhe, h);
         System.out.print("se agrego?"+rest);
         Reserva r = new Reserva();
         r.setNumeroReservacion(1005);
         r.setFechaActual(new Date());
         r.setFechaInicio(new Date());
         r.setFechaFinal(new Date());
         r.setCliente(new Cliente("000002", "das"));
         r.setListaHabitaciones(lhe);*/
        //  System.out.print("primero?"+lhe.getPrimero().getHabitacion().getNumHabitacion());
//       String s=   obtenerIDHabitaciones(r);
//      System.out.print(s);
        //boolean rest2 =  modificarReserva(Datos.getListaReservas(), r);
        //System.out.print("se mod?"+rest2);
        //  imprimirLista(Datos.getListaReservas());
    }
}
