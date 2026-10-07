public function up(): void
{
    Schema::create('doctors', function (Blueprint $table) {
        $table->id();
        $table->string('doctor_code')->unique();
        $table->string('name');
        $table->string('specialization');
        $table->string('phone', 20)->nullable();
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('doctors');
}