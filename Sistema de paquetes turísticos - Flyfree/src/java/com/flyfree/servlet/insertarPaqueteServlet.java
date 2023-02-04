/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.flyfree.servlet;

import com.flyfree.datos.paqueteData;
import com.flyfree.dominio.Destinos;
import com.flyfree.dominio.Paquete;
import com.flyfree.negocio.BusinessPaquete;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.Part;
import javax.swing.JOptionPane;

/**
 *
 * @author us
 */
@WebServlet(name = "insertarPaqueteServlet", urlPatterns = {"/insertarpaquete"})
public class insertarPaqueteServlet extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    
    
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException, SQLException {
        response.setContentType("text/html;charset=UTF-8");
        
         BusinessPaquete bp = new BusinessPaquete();
        boolean insertar = false;   
        String url;
        
        
        
        
        //int idDestino = Integer.parseInt(request.getParameter("idDestino"));
        //int idServicio = Integer.parseInt(request.getParameter("idServicio"));
        //int precio = Integer.parseInt(request.getParameter("precio"));
        //int dias = Integer.parseInt(request.getParameter("dias"));
        //int cantidad = Integer.parseInt(request.getParameter("cantidad"));
        String fecha = request.getParameter("fecha");
        String descripcion = request.getParameter("descripcion");
        Part part = request.getPart("image");
         
        //Paquete paq =  new Paquete( new Destinos(idDestino),idServicio,precio,dias,cantidad,fecha,descripcion,part);
        Paquete paq =  new Paquete( new Destinos(1),1,100,2,2,fecha,descripcion,part);
        insertar = bp.agregarPaquete(paq);
     
        if(insertar){
            url = "panel.jsp";
        }else{
            url = "index.jsp";
        }
     
        RequestDispatcher despachador = request.getRequestDispatcher(url);
        despachador.forward(request, response);
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            processRequest(request, response);
        } catch (SQLException ex) {
            Logger.getLogger(insertarPaqueteServlet.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            processRequest(request, response);
        } catch (SQLException ex) {
            Logger.getLogger(insertarPaqueteServlet.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
