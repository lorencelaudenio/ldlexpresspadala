# ldlexpresspadala
LDL ExpressPadala Features:

1. Transaction Code Generation: When a user initiates a money sending transaction, LDL ExpressPadala generates a unique transaction code as a reference for the transaction.

2. Transaction Validation: Transactions are validated using the transaction code. Only when the provided code matches the code associated with a specific transaction can that transaction be released.

3. Admin and User Privileges: The system supports two user roles: Admin and User. Only Admins have the authority to add new users to the system. Regular Users can send and receive money but cannot add new users.

4. Transaction Deletion (Admin Only): In Admin mode, administrators can delete specific transactions. This action effectively removes the transaction from the transaction database, maintaining data integrity.

5. Auto-Calculation of Fees: The system automatically calculates a transaction fee of 2% based on the transaction amount, ensuring transparency in fees for users.

6. Receipt Printing: After a successful transaction, the system generates a receipt that includes transaction details, fees, and a transaction ID. Users have the option to print the receipt for their records.

7. Receipt Storage: Copies of receipts are saved on the server for easy retrieval. Users can access their transaction history and download receipts whenever needed.

username: guest password: guest

Requirements: fpdf - Source: http://www.fpdf.org/en/download.php this file is needed for creation of receipt in pdf format
