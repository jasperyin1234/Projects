import java.io.*;
import java.util.*;

public class DoctorList 
{
	// List of Doctor
	private ArrayList <Doctor> doctorList;
	
	// Get doctor list 
	public Doctor[] getDoctorList()
	{
		Doctor[] permanentList = new Doctor [doctorList.size()];
		for (int i = 0; i < doctorList.size(); i++) 
		{
			permanentList[i] = doctorList.get(i);
		}
		return permanentList;
	}
	
	// Constructor
	public DoctorList()
	{
		doctorList = new ArrayList <Doctor>();
	}
	
	// Record new Doctor into array list 
	public void recordDoctor(Doctor d)
	{
		doctorList.add(d);
	}
	
	// Get number of Doctor
	public int getNumberOfDoctor()
	{
		return doctorList.size();
	}

	// Find doctor by username and password
	public Doctor findDoctor(String username, String password)
	{
		Doctor doctor = null;
		boolean found = false;
		int i =0;
		int count = getNumberOfDoctor();
		
		while(i< count && !found)
		{
			doctor = doctorList.get(i);
			if((doctor.getUsername().equals(username)) && (doctor.getPassword().equals(password)))
				found = true;
			else 
				i++;
		}
		if (found)
			return doctor;
		else 
			return null;
	}
	
	// Find doctor by name 
	public Doctor findDoctor(String name)
		{
			Doctor doctor = null;
			boolean found = false;
			int i =0;
			int count = getNumberOfDoctor();
			
			while(i< count && !found)
			{
				doctor = doctorList.get(i);
				if(doctor.getName().equals(name))
					found = true;
				else 
					i++;
			}
			if (found)
				return doctor;
			else 
				return null;
		}
	
	// Register new Doctor (done by Admin only)
	public void addDoctor()
	{
		Scanner input = new Scanner(System.in);
		System.out.println(" ");
		System.out.println("--REGISTER NEW DOCTOR ACCOUNT--");
		System.out.print("Please enter doctor's name : ");
		String doctorName = input.nextLine();
		String userType = "Doctor";
		
		// for username validation
		boolean sameName = false;
		String username;
		
		do
		{
			sameName = false;
			System.out.print("Please enter username : ");
			username = input.nextLine();
			for(int i = 0; i < doctorList.size(); i++)
			{
				if(username.equals(doctorList.get(i).getUsername()))
					sameName = true;
			}
			if(sameName == true)
				System.out.println("Username used. Please enter another username!");
		}while(sameName);
			
		System.out.print("Please enter password : ");
		String password = input.nextLine();
		System.out.print("Please enter phone number : ");
		String phoneNumber = input.nextLine();
		System.out.print("Please enter doctor's specialty : ");
		String specialty = input.nextLine();
		System.out.print("Please enter doctor's credentials : ");
		String credentials = input.nextLine();

		Doctor d = new Doctor(doctorName, userType, username, password, phoneNumber, specialty, credentials);
		recordDoctor(d);
		
		System.out.println("Registration done!");
	}
	
	// Displaying all Doctor info in a table
	public void displayDoctorList()
	{
		System.out.println(" ");
		System.out.printf("---------------------------------------DOCTOR LIST-----------------------------------------\n");
		System.out.println("BIL  NAME                 USERNAME            SPECIALTY      CREDENTIALS       PHONE NUMBER");
		System.out.println("-------------------------------------------------------------------------------------------");
		for(int i = 0; i < doctorList.size(); i++)
		{
			System.out.printf("%-5d%-21s%-20s%-15s%-18s%-10s\n", (i+1), doctorList.get(i).getName(), 
					doctorList.get(i).getUsername(), doctorList.get(i).getSpecialty(), 
					doctorList.get(i).getCredentials(), doctorList.get(i).getPhoneNumber());
		}
	}
	
	// Read Doctor list from textfile
	public void inputDoctorList()
	{
		try
		{
			// import Patient text file
			File inFile = new File("Doctor.txt");
			Scanner inputFile = new Scanner(inFile);
			while(inputFile.hasNext())
			{
				String readData = inputFile.nextLine();
				StringTokenizer token = new StringTokenizer(readData, "[|]");
				
				String inDoctorName = token.nextToken();
				String inUsertype = token.nextToken();
				String inUsername = token.nextToken();
				String inPassword = token.nextToken();
				String inPhonenumber = token.nextToken();
				String inSpecialty = token.nextToken();
				String inCredentials = token.nextToken();
				
				// Add doctor list from text file into doctor array list 	
				Doctor inDoctor = new Doctor(inDoctorName, inUsertype, inUsername, inPassword, inPhonenumber, inSpecialty, inCredentials);
				recordDoctor(inDoctor);			
				
			}
			inputFile.close();
		}
		catch(FileNotFoundException e)
		{
		 System.out.println("Error opening Doctor file");
		}
	}
	
	// Write Doctor list to textfile
	public void outputDoctorList() 
	{			
		try
		{
			File outFile = new File("Doctor.txt");
			PrintWriter outputFile = new PrintWriter(outFile);
			
			for(int i = 0; i < doctorList.size(); i++)
			{
				outputFile.println(doctorList.get(i).getName() + "|" + 
						doctorList.get(i).getUserType() + "|" +
						doctorList.get(i).getUsername() + "|" +
						doctorList.get(i).getPassword() + "|" +
						doctorList.get(i).getPhoneNumber() + "|" +
						doctorList.get(i).getSpecialty() + "|" +
						doctorList.get(i).getCredentials());
				
			}
			outputFile.close();
		}
		catch(FileNotFoundException e)
		{
			System.out.println("Error opening Doctor file");
		}
	}
}
