/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.flyfree.datos;

import com.flyfree.dominio.Destinos;
import com.flyfree.dominio.Paquete;
import java.io.IOException;
import java.io.InputStream;
import java.sql.Blob;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.LinkedList;
import javax.servlet.http.Part;
import javax.swing.JOptionPane;

/**
 *
 * @author us
 */
public class paqueteData extends BaseData {
    
    private PreparedStatement statement;
    private Statement stmServicio;
    private Statement stmDestino;
    private Statement stmTipo;
    private ResultSet rsServicio;
    private ResultSet rsDestino;
   
    
    private Connection con;
    

   public LinkedList<Paquete> getMostrarPaquete() throws SQLException{
        String sql = "call MostrarPaquetes";
        LinkedList<Paquete> listaPaquetes = new LinkedList();
        con = getConexion();
        ResultSet result;
            int idPaquete;
            int idDestino;
            int idServicio;
            int precio;
            int dias;
            int cantidad;
            String fecha;
            String descripcion;
            Blob b;
         
        if(con != null){
            statement = con.prepareStatement(sql);
            result =  statement.executeQuery();  
            while (result.next()){      
                
                idPaquete = result.getInt("paqueteid");                
                idDestino =  result.getInt("destinoid");
                idServicio = result.getInt("servicioid");
                descripcion = result.getString("paquetedescripcion");  
                cantidad = result.getInt("paquetecantidadpersonas");
                fecha = result.getString("paquetefecha");
                dias =  result.getInt("paquetedias");
                precio = result.getInt("paqueteprecio");
                b = result.getBlob("imagen");
                Paquete pa = new Paquete(idPaquete,new Destinos(idDestino),idServicio,precio,dias,cantidad,fecha,descripcion,b);
                
                listaPaquetes.add(pa);                            
            }            
           
            result.close();
        }
             
        //JOptionPane.showMessageDialog(null,listaPaquetes);
         return listaPaquetes;
    }
   
   public int obtenerIdTipo(Paquete p) throws SQLException{
        String sql6 = "SELECT tipoid FROM `tbtipos` WHERE tiponombre = '" +p.getServicioNombre()+"'";
          //JOptionPane.showMessageDialog(null,p.getServicioNombre() );
        boolean inserto = false;
        int idTipo = 0;
        
        con = getConexion();
        if(con!=null){
             ResultSet rsTipo;
            stmTipo= con.createStatement();
            rsTipo = stmTipo.executeQuery(sql6);
            while(rsTipo.next()){
                
                idTipo = Integer.parseInt(rsTipo.getString("tipoid"));
            inserto = true;
         //   JOptionPane.showMessageDialog(null,idTipo );
            }
            stmTipo.close();
            con.close();
        }
      
        
        return idTipo;
       
   }
   
   public int obtenerIdDestino(Paquete p) throws SQLException{
        String sql7 = "SELECT * FROM `tbdestino` WHERE tbdestino.destinonombre = '"+p.getIdDestino().getDestinonombre()+"'";
          //JOptionPane.showMessageDialog(null,p.getServicioNombre() );
        boolean inserto = false;
        int idDestino = 0;
        
        con = getConexion();
        if(con!=null){
             ResultSet rsTipo;
            stmDestino= con.createStatement();
            rsDestino = stmDestino.executeQuery(sql7);
            while(rsDestino.next()){
                
                idDestino = Integer.parseInt(rsDestino.getString("destinoid"));
            inserto = true;
            JOptionPane.showMessageDialog(null,idDestino );
            }
            stmDestino.close();
            con.close();
        }
      
        
        return idDestino;
       
   }
   
   public boolean agregarPaquete(Paquete p) throws IOException, SQLException{
        //variables
        boolean inserto = false;
        
        //String sql = "call agregarPaquete(0,?,?,?,?,?,?,?,?)";
        //String sql2 = "INSERT INTO `tbpaquete`(`paqueteid`, `idDestino`, `descripcion`, `cantidad`, `fecha`, `dias`, `precio`, `idservicio`, `imagen`) VALUES (0,?,?,?,?,?,?,?,?)";
        //String sql3 = "INSERT INTO `tbpaquete`(`paqueteid`, `idDestino`, `descripcion`, `cantidad`, `fecha`, `dias`, `precio`, `idservicio`, `imagen`) VALUES (0,(SELECT destinoid from tbdestino WHERE destinoid='?'),?,?,?,?,?,(SELECT servicioid from tbservicios WHERE servicioid='?'),?)";
      //  String sql4 = "INSERT INTO `tbpaquetes`(`paqueteid`, `destinoid`, `paquetedescripcion`, `paquetecantidadpersonas`, `paquetefecha`, `paquetedias`, `paqueteprecio`, `servicioid`, `imagen`) VALUES (0,(SELECT destinoid from tbdestino WHERE destinoid='?'),?,?,?,?,?,(SELECT servicioid from tbservicios WHERE servicioid='?'),?)";
        String sql5 = "INSERT INTO `tbpaquetes`(`paqueteid`, `destinoid`, `paquetedescripcion`, `paquetecantidadpersonas`, `paquetefecha`, `paquetedias`, `paqueteprecio`, `servicioid`, `imagen`) VALUES(0,?,?,?,?,?,?,?,?)";
       // String sql6 = "SELECT * FROM `tbtipos` WHERE tiponombre = '" +p.getServicioNombre()+"'";
       // String sql7 = "SELECT * FROM `tbdestino` WHERE tbdestino.destinonombre = '"+p.getIdDestino().getDestinonombre()+"'";
        InputStream imagen = p.getImagen().getInputStream();
        //conexion
        
        int idServicio = obtenerIdTipo(p);
        int idDestino = obtenerIdDestino(p);
        
       
        Destinos aux = new Destinos();
        aux.setDestinoid(idDestino);
        p.setIdDestino(aux);
        p.setIdServicio(idServicio);
        
         //JOptionPane.showMessageDialog(null,p.getIdDestino());
         // JOptionPane.showMessageDialog(null,p.getIdServicio());
       /* JOptionPane.showMessageDialog(null,p.getCantidad() );
        JOptionPane.showMessageDialog(null,p.getDescripcion() );
        JOptionPane.showMessageDialog(null,p.getDias() );
        JOptionPane.showMessageDialog(null,p.getFecha() );
        JOptionPane.showMessageDialog(null,p.getIdDestino() );
        JOptionPane.showMessageDialog(null,p.getIdServicio() );
        JOptionPane.showMessageDialog(null,p.getImagen() );
        JOptionPane.showMessageDialog(null,p.getPrecio() );
        */
        
        
       // JOptionPane.showMessageDialog(null,p.getIdDestino().getIdDestino() );
        con = getConexion();
        
      
        if(con!=null){
            
            statement = con.prepareStatement(sql5);
            
            statement.setInt(1, p.getIdDestino().getDestinoid());
            statement.setString(2, p.getDescripcion());
            statement.setInt(3, p.getCantidad());
            statement.setString(4, p.getFecha());
            statement.setInt(5, p.getDias());
            statement.setDouble(6, p.getPrecio());
            statement.setInt(7, p.getIdServicio());
            statement.setBlob(8,imagen );
            
            statement.executeUpdate();
            statement.close();
            con.close();
            inserto = true;
            
        }else{
            
            JOptionPane.showMessageDialog(null,"Error al insertar" );
            
        }
        
        return inserto;
    }
    
    /*public boolean agregarPaquete(Paquete paquete) throws SQLException, IOException{
    //procedimiento para insertar en la base de datos
        boolean inserto = false;
        String sql = "call insertarPaquete(0,?,?,?,?,?,?,?,?);";
        String sql2 = "INSERT INTO `tbpaquetes`( `destinoid`, `paquetedescripcion`, `paquetecantidadpersonas`, `paquetefecha`, `paquetedias`, `paqueteprecio`, `servicioid`, `imagen`) VALUES (?,?,?,?,?,?,?,?)";
        InputStream img = paquete.getImagen().getInputStream();
            con = getConexion();
        //JOptionPane.showMessageDialog(null,paquete+"*****" );
        if (con != null){
            statement = con.prepareStatement(sql2);
            
            statement.setInt(1,paquete.getIdDestino().getDestinoid());
            statement.setString(2,paquete.getDescripcion());
            statement.setInt(3,paquete.getCantidad());
            statement.setString(4,paquete.getFecha());
            statement.setInt(5,paquete.getDias());
            statement.setDouble(6,paquete.getPrecio());
            statement.setInt(7,paquete.getIdServicio());
            statement.setBlob(8,img);
            statement.executeUpdate();
            statement.close();
            con.close();
            inserto = true;
        }else{
            JOptionPane.showMessageDialog(null,"Error al insertar" );
        }
      return inserto;
    }*/
    
    /*
    public LinkedList<Paquete> BuscarPaquete(int codigo) throws SQLException{
        LinkedList<Paquete>listaPaquete = new LinkedList();
        con = getConexion();
        //JOptionPane.showMessageDialog(null,codigo);
        String sql = "call buscarPaquete(?)";       
        Paquete paquete;
        ResultSet result;
        int idPaquete;
        int idDestino;
        int idServicio;
        int precio;
        int dias;
        int cantidad;
        String fecha;
        String descripcion;     
        if(con != null){
            statement = con.prepareStatement(sql);
            statement.setInt(1,codigo);
            result =  statement.executeQuery();
            while (result.next()){      
                                
                idPaquete = result.getInt("paqueteid");
                idDestino = result.getInt("destinoid");
                idServicio = result.getInt("servicioid");
                descripcion = result.getString("paquetedescripcion");
                cantidad = result.getInt("paquetecantidadpersonas");
                fecha = result.getString("paquetefecha");
                dias = result.getInt("paquetedias");
                precio = result.getInt("paqueteprecio");
                               
                paquete = new Paquete(idPaquete,idDestino,idServicio,precio,cantidad,dias,fecha,descripcion);
                //JOptionPane.showMessageDialog(null,paquete+"*******");
                listaPaquete.add(paquete);                        
            }                       
            result.close();
        }
        statement.close();
        con.close();   
        return listaPaquete;
    }
    */
    public boolean ModificarPaquete(Paquete paquete) throws SQLException{
        con = getConexion();
        //JOptionPane.showMessageDialog(null,paquete+"*******");
        String sql = "call actualizarPaquete(?,?,?,?,?,?,?,?)";
        boolean insertar = false;   
        if(con != null){
            statement = con.prepareStatement(sql);         
            
            statement.setDouble(1,paquete.getPrecio());
            statement.setInt(2,paquete.getDias());
            statement.setInt(3,paquete.getCantidad());
            statement.setString(4,paquete.getFecha());
            statement.setString(5,paquete.getDescripcion()); 
            statement.setInt(6,paquete.getIdPaquete());
            statement.setInt(7,paquete.getIdDestino().getDestinoid());
            statement.setInt(8,paquete.getIdServicio()); 
            statement.executeUpdate();
            insertar = true;
        }
        statement.close();        
        con.close();       
        return insertar;
    }
    
    public boolean eliminarPaquete(int codigo) throws SQLException{
        boolean elimino = false;
        con = getConexion();
        JOptionPane.showMessageDialog(null,codigo);
        String sql = "call eliminarPaquete(?)";       
        Paquete paquete;
        ResultSet result;
        int idPaquete;
        int idDestino;
        int idServicio;
        int precio;
        int dias;
        int cantidad;
        String fecha;
        String descripcion;     
        if(con != null){
            statement = con.prepareStatement(sql);
            statement.setInt(1,codigo);
            elimino=true;
            result =  statement.executeQuery();                    
            result.close();
        }
        statement.close();
        con.close();   
        return elimino;
    }
    
    

}
