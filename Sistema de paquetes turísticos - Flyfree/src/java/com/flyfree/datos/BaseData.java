/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.flyfree.datos;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;

/**
 *
 * @author andra
 */
public class BaseData {
    
     private static Connection  con = null;
    private static String usuario = "root";
    private static String pass = "";

    public static Connection getConexion(){
    
        try {
            Class.forName ("com.mysql.jdbc.Driver");
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(PersonaData.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        try {
                //JOptionPane.showMessageDialog(null,"Estableciendo conexión local" );
            con = DriverManager.getConnection("jdbc:mysql://localhost:3306/dbflyfree", usuario,pass);
        } catch (SQLException e) {                
            Logger.getLogger(PersonaData.class.getName()).log(Level.SEVERE, null, e);
                JOptionPane.showMessageDialog(null,"Error de conexión" );
        }
        return con;
    }
    
}
