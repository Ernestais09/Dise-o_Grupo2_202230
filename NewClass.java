/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.mavenproject2;

import java.sql.Connection;
import java.sql.DriverManager;
import javax.swing.JOptionPane;

/**
 *
 * @author Ricardo Ranauro
 */
public class NewClass {
    Connection conectar = null;
    
    public  Connection estableceConexion()  {
        try {
           Class.forName("com.mysql.jdbc.Driver");
           conectar=DriverManager.getConnection("jdbc:mysql://datosgps.cbh1dasavvq2.us-east-1.rds.amazonaws.com:3306/datosgps","ricardo","ricardorobot22");
           System.out.println(" se conectó correctamente a la base de datos");
        
        } catch(Exception e){
           System.out.println("No se conectó a la base de datos, error :"+ e.toString()); 
        }
        
      return conectar;  
}
    }
