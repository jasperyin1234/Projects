import java.io.*;
import java.util.*;

public class PatientList 
{
	// List of Patient
	private ArrayList <Patient> patientList;
	
	// Get Patient list
	public Patient[] getPatientList()
	{
		Patient[] permanentList = new Patient [patientList.size()];
		for (int i = 0; i < patientList.size(); i++) 
		{
			permanentList[i] = patientList.get(i);
		}
		return permanentList;
	}
	
	// Constructor
	public PatientList()
	{
		patientList = new ArrayList <Patient>();
	}
	
	// Record new Patient into array list 
	public void recordPatient(Patient p)
	{
		patientList.add(p);
	}
	
	// Get number of Patient 
	public int getNumberOfPatient()
	{
		return patientList.size();
	}	
	
	// Find Patient by username and password
	public Patient findPatient(String username, String password )
	{
		Patient patient = null;
		boolean found = false;
		int i =0;
		int count = getNumberOfPatient();
				
		while(i< count && !found)
		{
			patient = patientList.get(i);
			if((patient.getUsername().equals(username)) && (patient.getPassword().equals(password)))
				found = true;
			else 
				i++;
		}
		if (found)
			return patient;
		else 
			return null;
	}
	
	// Find Patient by name 
	public Patient findPatient(String name)
	{
		Patient patient = null;
		boolean found = false;
		int i =0;
		int count = getNumberOfPatient();
					
		while(i< count && !found)
		{
			patient = patientList.get(i);
			if(patient.getName().equals(name))
				found = true;
			else 
				i++;
		}
		if (found)
			return patient;
		else 
			return null;
		}

	// Registration of Patient
	public void registerPatient()
	{
		Scanner input = new Scanner (System.in);
		
		System.out.println();
		System.out.println("--REGISTER NEW PATIENT ACCOUNT--");
		System.out.print("Please enter full name as in IC: ");
		String name = input.nextLine();
		String userType = "PATIENT";
		
		// for username validation
		boolean sameName = false;
		String username;
				
		do
		{
			sameName = false;
			System.out.print("Please enter username: ");
			username = input.nextLine();
			for(int i = 0; i < patientList.size(); i++)
			{
				if(username.equals(patientList.get(i).getUsername()))
					sameName = true;
			}
			if(sameName == true)
				System.out.println("Username used. Please enter another username!");
		}while(sameName);
		
		System.out.print("Please enter password: ");
		String password = input.nextLine();
		System.out.print("Please enter phone number: ");
		String phoneNumber = input.nextLine();
		System.out.print("Please enter IC number: ");
		String icNumber = input.nextLine();
					
		System.out.println("Registration done!");
		
		Patient p = new Patient(name, userType, username, password, phoneNumber, icNumber);
		recordPatient(p);
	}
	
	// Displaying all Patient info in a table 
	public void displayPatientList()
	{
		System.out.println(" ");
		System.out.printf("-------------------------------PATIENT LIST--------------------------------\n");
		System.out.println("BIL  NAME                 USERNAME            IC NUMBER        PHONE NUMBER");
		System.out.println("---------------------------------------------------------------------------");
		for(int i = 0; i < patientList.size(); i++)
		{
			System.out.printf("%-5d%-21s%-20s%-17s%-10s\n", (i+1), patientList.get(i).getName(), 
					patientList.get(i).getUsername(), patientList.get(i).getIcNumber(), patientList.get(i).getPhoneNumber());
		}
	}
	
	// Read Patient list from textfile
	public void inputPatientList() 
	{
		try
		{
			// import Patient text file
			File inFile = new File("Patient.txt");
				
			// read data from the file
			Scanner inputFile = new Scanner(inFile);
			
			// read the file till the end 
			while(inputFile.hasNext())
			{
				String readData = inputFile.nextLine();
				StringTokenizer token = new StringTokenizer(readData, "[|]");
				
				String inPatientName = token.nextToken();
				String inUsertype = token.nextToken();
				String inUsername = token.nextToken();
				String inPassword = token.nextToken();
				String inPhonenumber = token.nextToken();
				String inIcNumber = token.nextToken();		

				// Add patient list from text file into patient array list 	
				Patient inPatient = new Patient(inPatientName, inUsertype, inUsername, inPassword, inPhonenumber, inIcNumber);
				recordPatient(inPatient);
				
			}
			inputFile.close();
		}
		catch(FileNotFoundException e)
		{
			System.out.println("Error opening Patient file");
		}
	}
	
	// Write Patient list to textfile
	public void outputPatientList() 
	{			
		try
		{
			File outFile = new File("Patient.txt");
			PrintWriter outputFile = new PrintWriter(outFile);
			
			for(int i = 0; i < patientList.size(); i++)
			{
				outputFile.println(patientList.get(i).getName() + "|" + 
									patientList.get(i).getUserType() + "|" +
									patientList.get(i).getUsername() + "|" +
									patientList.get(i).getPassword() + "|" +
									patientList.get(i).getPhoneNumber() + "|" +
									patientList.get(i).getIcNumber());
			}
			
			outputFile.close();
				
		}
		
		catch(FileNotFoundException e)
		{
			System.out.println("Error opening Patient file");
		}

	}
	
}