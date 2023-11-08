public class Patient extends User
{

	// Patient phone number
	private String phoneNumber;
	public String getPhoneNumber()
	{
		return phoneNumber;
	}
	
	// Patient IC number
	private String icNumber;
	public String getIcNumber()
	{
		return icNumber;
	}
	
	// Constructor
	public Patient(String name, String userType, String username, String password, String phoneNumber, String icNumber)
	{
		super(name, userType, username, password);
		this.phoneNumber = phoneNumber;
		this.icNumber = icNumber;
	}
	
	@Override
	//Patient details
	public String toString()
	{
		return "\n--ACCOUNT DETAILS--" + "\nName: " + getName() + "\nUser Type: " + getUserType() + "\nUsername: " + getUsername() +  "\nPhone Number: " + phoneNumber;
	}
	
}