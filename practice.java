// import java.util.*;
// public class practice
// {
// 	public static void main(String[] args) {
// 		Scanner in=new Scanner(System.in);
// 		int n=in.nextInt();
// 	    int	t=1,sum=0;
// 		while(((t+1)*(t+1))<n)
// 		{
// 		    t++;
// 		}
// 		while(sum<n)
// 		{
// 		    while((sum+(t*t))<=n)
// 		    {
// 		        sum+=t*t;
// 		        System.out.print(t+" ");
// 		    }
// 		    t--;
// 		}
// 	}
// }

//2nd 

import java.util.*;
public class practice
{
	public static void main(String[] args) {
	Scanner sc=new Scanner(System.in);
	String str=sc.nextLine();
	StringBuilder strb=new StringBuilder();
	String arr[]=str.split(" ");
	for(int i=0;i<arr.length;i++)
	{
	    String a=arr[i];
	    strb.append(a);
	    strb.reverse();
	    if(!a.equals(String.valueOf(strb)))
	    System.out.print(a+" ");
	    strb.setLength(0);
	}
	}
}